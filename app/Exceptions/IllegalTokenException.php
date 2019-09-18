<?php

namespace App\Exceptions;

use Exception;

class IllegalTokenException extends CustomBasicException
{
    const ERROR_CODE = '0002';
    const MESSAGE_PREFIX = 'illegal token.';
}
