<?php

namespace app\Models;

use MongoDB\Driver\Exception\ConnectionException;
use resources\Database;

class Model
{
    protected $dbConn;
    protected $isDeleted = false;

    public function __construct($attributes = [])
    {
        $this->dbConn = (new Database())->getConnection();

        foreach ($attributes as $attribute => $value) {
            $this->$attribute = $value;
        }
    }

    protected function getTable()
    {
        if (! empty($this->tableName)) {
            return $this->tableName;
        }

        return camel_to_snake((new \ReflectionClass($this))->getShortName());
    }

    public function create($data = [])
    {
        $data['date_created'] = (new \DateTime())->format('Y-m-d H:i:s');
        $query = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->getTable(),
            implode(', ', array_keys($data)),
            implode(', ', array_values($data))
        );
        if ($createQuery = $this->dbConn->query($query)) {
            $createQueryId = $this->dbConn->insert_id;
            $data['id'] = $createQueryId;

            return new self($data);
        } else {
            die("Error: " . $query . "<br>" . $this->dbConn->error);
        }
    }

    public function update($data = [])
    {
        if (! isset($this->id) || empty($this->id)) {
            throw new ConnectionException('Cannot connect to '.$this->getTable());
        }

        $numData = count($data);
        $numAddedColumn = 0;
        $columnUpdates = '';
        foreach ($data as $column => $value) {
            $columnUpdates .= sprintf(
                ' %s = "%s"',
                $column,
                $value
            );
            $numAddedColumn++;
            if ($numAddedColumn < $numData) {
                $columnUpdates .= ',';
            }
        }

        $query = sprintf(
            'UPDATE %s SET %s WHERE id = %s',
            $this->getTable(),
            $columnUpdates,
            $this->id
        );
        if ($createQuery = $this->dbConn->query($query)) {
            foreach ($data as $field => $value) {
                $this->$field = $value;
            }

            return $this;
        } else {
            die("Error: " . $query . "<br>" . $this->dbConn->error);
        }
    }

    public function delete()
    {
        if (! isset($this->id) || empty($this->id)) {
            throw new ConnectionException('Cannot connect to '.$this->getTable());
        }

        $query = sprintf(
            'DELETE FROM %s WHERE id = %s',
            $this->getTable(),
            $this->id
        );
        if ($createQuery = $this->dbConn->query($query)) {
            $this->isDeleted = true;

            return $this;
        } else {
            die("Error: " . $query . "<br>" . $this->dbConn->error);
        }
    }

    public function getAll()
    {
        $entities = [];
        $query = sprintf('SELECT * FROM %s', $this->getTable());
        if ($selectQuery = $this->dbConn->query($query)) {
            while($row = $selectQuery->fetch_assoc()) {
                $entities[] = new self($row);
            }
        } else {
            die("Error: " . $query . "<br>" . $this->dbConn->error);
        }

        return $entities;
    }

    public function find($id)
    {
        $query = sprintf(
            'SELECT * FROM %s WHERE id = %s',
            $this->getTable(),
            $id
        );

        return $this->getFirstOfQuery($query);
    }

    public function getFirstOfQuery($query)
    {
        if ($selectQuery = $this->dbConn->query($query)) {
            while($row = $selectQuery->fetch_assoc()) {
                return new self($row);
            }
        } else {
            die("Error: " . $query . "<br>" . $this->dbConn->error);
        }

        return null;
    }
}
