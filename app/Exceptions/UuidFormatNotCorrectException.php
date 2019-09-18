<?php

namespace App\Exceptions;

use Exception;

class UuidFormatNotCorrectException extends CustomBasicException
{
    const ERROR_CODE = '0004';
    const MESSAGE_PREFIX = 'uuid format not correct: ';
}
