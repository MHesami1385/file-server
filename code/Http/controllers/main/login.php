<?php

use Core\Session;

view("main/login.view.php", [
    'heading' => 'Sign in',
    'message' => Session::get('message')
]);