<?php

namespace App\Exceptions;

use Exception;

class UserEmailRepeatException extends CustomBasicException
{
    const ERROR_CODE = '0096';
    const MESSAGE_PREFIX = 'user email repeat: ';
}
