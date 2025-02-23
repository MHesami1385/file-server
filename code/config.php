<?php

use Core\Validator;

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'file-server',
        'charset' => 'utf8mb4',
        'user' => 'root',
        'password' => '1234'
    ],
    'validation' => [
        Validator::LOGIN => function ($attributes) {
            if (!Validator::string($attributes['username'], 10) || !Validator::string($attributes['password'])) {
                $this->message('All fields are required and username must contain at least 10 characters!');
            }
        },
        Validator::CHANGE => function ($attributes) {
            if (!Validator::string($attributes['password']) || !Validator::string($attributes['repassword']) || $attributes['password'] !== $attributes['repassword']) {
                $this->message('All fields are required and passwords must match!');
            }
        },
        Validator::CREATE => function ($attributes) {
            if (!Validator::string($attributes['username'], 10, 10) || !Validator::string($attributes['fullname']) || !is_numeric($attributes['username'])) {
                $this->message = 'All fields are required and username must contain 10 digits!';
            }
        }
    ]
];