<?php


namespace Core\Exceptions;


class ValidationException extends \Exception
{
    private $errors;

    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}