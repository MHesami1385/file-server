<?php

use Core\DatabaseActions\Authenticator;
use Core\Validator;
use Http\Forms;

$form = Forms::validate($attributes = [
    "username" => $_POST["username"],
    "password" => $_POST["password"],
    Validator::OPTION => Validator::LOGIN
]);

$signedIn = (new Authenticator)->attempt($attributes['username'], $attributes['password']);
if (!$signedIn) {
    $form->message("Incorrect username or password!")
        ->throw();
}
//else
redirect("/");


