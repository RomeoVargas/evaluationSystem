<?php

namespace app\Models;

class Admin extends Model
{
    public static function logIn($username, $password)
    {
        $adminInstance = new self();
        $query = sprintf(
            'SELECT * FROM %s WHERE username = "%s" AND password = "%s"',
            $adminInstance->getTable(),
            $username,
            md5($password)
        );

        $user = $adminInstance->getFirstOfQuery($query);
        if (! empty($user)) {
            return $user->update([
                'date_last_logged_in' => (new \DateTime())->getTimestamp()
            ]);
        }
        return null;
    }
}
