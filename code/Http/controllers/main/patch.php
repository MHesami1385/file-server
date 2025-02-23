<?php

use Core\DatabaseActions\Updater;
use Core\Session;
use Core\Validator;
use Http\CommandLine;
use Http\Forms;


$form = Forms::validate($attributes = [
    "password" => $_POST["password"],
    "repassword" => $_POST["repassword"],
    Validator::OPTION => Validator::CHANGE
]);

$changed = (new Updater)->attempt($attributes["password"]);
if (!$changed) {
    $form->message("Something went wrong while trying to change the password!")
        ->throw();
}

CommandLine::changePassword($_SESSION['username'], $attributes["password"]);

Session::flash('message', '<span class="text-green-500">Password changed successfully!</span>');
redirect("/");






