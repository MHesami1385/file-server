<?php

namespace Core\DatabaseActions;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator
{
    public function attempt($username, $password)
    {
        $user = App::resolve(Database::class)->query("SELECT * FROM `users` WHERE username = :username;", [
            ':username' => $username
        ])->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $this->login($user['username']);
            return true;
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['username'] = $user;

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}