<?php

namespace App\Exceptions;

use Exception;

class CustomBasicException extends Exception
{

    public function __construct($message, $code = '9999')
    {
        parent::__construct($message, $code);
    }

    public function formatOutputMessage($message)
    {
        return __CLASS__ . ', ' . $message;
    }
}
