<?php

namespace Core;

use Exception;

class ValidationException extends Exception
{
    public readonly string $messages;
    public readonly array $old;

//    protected $old = [];
    public static function throw($messages, $old = null)
    {
        $instance = new static;

        $instance->messages = $messages;
        $instance->old = $old;

        throw $instance;
    }
}