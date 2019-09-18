<?php

namespace App\Exceptions;

use Exception;

class TokenNotMatchUserException extends CustomBasicException
{
    const ERROR_CODE = '0002';
    const MESSAGE_PREFIX = 'token not match user.';
}
