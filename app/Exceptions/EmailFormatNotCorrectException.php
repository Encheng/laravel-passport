<?php

namespace App\Exceptions;

use Exception;

class EmailFormatNotCorrectException extends CustomBasicException
{
    const ERROR_CODE = '0092';
    const MESSAGE_PREFIX = 'email format not correct: ';
}
