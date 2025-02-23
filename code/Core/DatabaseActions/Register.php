<?php

namespace Core\DatabaseActions;

use Core\App;
use Core\Database;
use Core\Response;
use PDOException;

class Register
{
    public function attempt($username, $fullname)
    {
        try {
            App::resolve(Database::class)->query("INSERT INTO `users` VALUES (:username, :password, :fullname, CURRENT_TIMESTAMP);", [
                ':username' => $username,
                ':password' => password_hash($username, PASSWORD_BCRYPT),
                ':fullname' => $fullname
            ]);
        } catch (PDOException $e) {
            if ($e->getCode() == Response::SQL_DUPLICATED) {
                return false;
            }
        }
        return true;
    }
}