<?php

// the view loader controller for the user creation

// GET

use Core\Session;

view("users/create.view.php", [
    'heading' => 'Create a User',
    'message' => Session::get('message')
]);
