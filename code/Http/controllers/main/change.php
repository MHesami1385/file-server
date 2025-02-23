<?php

use Core\Session;

$name = "change";
if ($_SESSION['username'] == 'Administrator') {
    $name = "change-admin";
}

view("main/$name.view.php", [
    'heading' => 'Change Password',
    'message' => Session::get('message')
]);