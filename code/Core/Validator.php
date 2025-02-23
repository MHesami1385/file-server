<?php

namespace Core;

class Validator
{
    const OPTION = 'option';
    const LOGIN = 'login';
    const CHANGE = 'change';
    const CREATE = 'create';

    public static function string($value, $min = 1, $max = INF)
    {

        $value = trim($value);

        return ($min <= strlen($value) && strlen($value) <= $max);
    }
}