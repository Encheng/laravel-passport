<?php

namespace App\Exceptions;

use Exception;

class UserNotRegisterException extends CustomBasicException
{
    const ERROR_CODE = '0002';
    const MESSAGE_PREFIX = 'user not register: ';
}
