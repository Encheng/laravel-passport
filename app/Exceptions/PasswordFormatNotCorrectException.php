<?php

namespace App\Exceptions;

use Exception;

class PasswordFormatNotCorrectException extends CustomBasicException
{
    const ERROR_CODE = '0003';
    const MESSAGE_PREFIX = 'password format not correct.';
}
