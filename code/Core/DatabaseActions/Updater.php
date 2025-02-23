<?php

namespace Core\DatabaseActions;

use Core\App;
use Core\Database;
use PDOException;

class Updater
{
    public function attempt($password)
    {
        try {
            App::resolve(Database::class)->query("UPDATE `users` SET `password` = :password WHERE `users`.`username` = :username;", [
                ':username' => $_SESSION['username'],
                ':password' => password_hash($password, PASSWORD_BCRYPT)
            ])->fetch();
        } catch (PDOException $e) {
                return false;
        }
        return true;
    }
}