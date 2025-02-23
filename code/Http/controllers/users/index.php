<?php
//shows all the files and the main panel

//GET


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$users = $db->query("SELECT username,fullname FROM `users`  ORDER BY `date` ASC ;")->fetchAll();


$users = array_reverse($users);//FOR RENDER

view("users/index.view.php", [
    'heading' => 'Manage Users',
    'users' => $users,
    'noUser' => empty($users[1])
]);


