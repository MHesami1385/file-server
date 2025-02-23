<?php
// delete the user

// delete

use Core\App;
use Core\Database;
use Core\Session;
use Http\CommandLine;


$username = $_POST['username'];
$db = App::resolve(Database::class);

$db->query("DELETE FROM `users` WHERE `users`.`username` = :username;",
    [
        ":username" => $username
    ]);


Session::flash('message', "<span class='text-red-600'>User $username has been deleted!</span>");
CommandLine::deleteUser($username);


redirect('/');


