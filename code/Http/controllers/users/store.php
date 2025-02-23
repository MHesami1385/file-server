<?php
// create the user on the database

// post

use Core\DatabaseActions\Register;
use Core\Session;
use Core\Validator;
use Http\CommandLine;
use Http\Forms;

$form = Forms::validate($attributes = [
    "username" => $_POST["username"],
    "fullname" => $_POST["fullname"],
    Validator::OPTION => Validator::CREATE
]);

$userCreated = ((new Register)->attempt($attributes['username'], $attributes['fullname']));
if (!$userCreated) {
    $form->message("Username already exists!")
        ->throw();
}

Session::flash('message', "<span class='text-green-600'>User {$attributes['username']} has been created!</span>");
CommandLine::createUser($attributes['username'], $attributes['username'], $attributes['fullname']); //username = password

redirect("/users/create");

