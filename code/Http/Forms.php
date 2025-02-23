<?php

namespace Http;

use Core\ValidationException;
use Core\Validator;

class Forms
{
    protected $message = null;
    protected $validation = [];

    public function __construct(public array $attributes)
    {
        $this->validation = (require base_path("config.php"))['validation'];

        $option = $this->attributes[Validator::OPTION];
        if (array_key_exists($option, $this->validation)) {
            return ($this->validation[$option]($this->attributes));
        } else
            dd("Validation option '{$this->attributes['option']}' not found");

    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->messages(), $this->attributes);
    }

    public function failed()
    {
        return !empty($this->messages());
    }

    public function messages()
    {
        return $this->message;
    }


    public function message($message)
    {
        $this->message = $message;

        return $this;
    }
}