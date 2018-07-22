<?php

namespace resources;

class Database
{
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $connection;

    public function __construct()
    {
        $constants = json_decode(file_get_contents('constants.json'), true);
        $this->host     = $constants['DB_HOST'];
        $this->user     = $constants['DB_USERNAME'];
        $this->password = $constants['DB_PASSWORD'];
        $this->dbname   = $constants['DB_DATABASE'];
        
        // Create connection
        $conn = new \mysqli($this->host, $this->user, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $this->connection = $conn;
    }
}
