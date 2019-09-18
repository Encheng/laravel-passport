<?php

namespace App\Exceptions;

use Exception;

class CanNotFoundUserException extends CustomBasicException
{
    const ERROR_CODE = '0093';
    const MESSAGE_PREFIX = 'can not find user : ';
}
