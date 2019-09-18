<?php

namespace App\Exceptions;

use Exception;

class UserDoNotHaveEmailException extends CustomBasicException
{
    const ERROR_CODE = '0002';
    const MESSAGE_PREFIX = 'account do not have email: ';
}
