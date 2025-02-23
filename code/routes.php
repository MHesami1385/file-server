<?php


$router->get('/', 'main/redirect.php');

$router->get('/login', 'main/login.php')->only('guest');
$router->post('/login', 'main/auth.php')->only('guest');
$router->delete('/login', 'main/logout.php')->only('auth'); // delete login = logout
$router->get('/change-pass', 'main/change.php')->only('auth');
$router->patch('/change-pass', 'main/patch.php')->only('auth');

$router->get('/users/manage', 'users/index.php')->only('admin');
$router->get('/users/create', 'users/create.php')->only('admin');
$router->post('/users/create', 'users/store.php')->only('admin');
$router->delete('/users/manage', 'users/delete.php')->only('admin');
$router->patch('/users/manage', 'users/patch.php')->only('admin');
