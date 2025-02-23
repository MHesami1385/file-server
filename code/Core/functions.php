<?php

use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    return require base_path("views/" . $path);
}

function redirect($path)
{
    header("Location: $path");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}