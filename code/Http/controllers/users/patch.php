<?php
// reset the password

// patch

use Core\App;
use Core\Database;
use Core\Session;
use Http\CommandLine;

$username = $_POST['username'];
$db = App::resolve(Database::class);

$db->query("UPDATE `users` SET `password` = :password WHERE `users`.`username` = :username;",
    [
        ":password" => password_hash($username, PASSWORD_BCRYPT),
        ":username" => $username
    ]);

Session::flash('message', "<span class='text-yellow-500'>Password for user $username has been reset!</span>");
CommandLine::changePassword($username, $username); ////username = password

redirect('/');