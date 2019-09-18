<?php

namespace App\Exceptions;

use Exception;

class AccountOrPasswordFailException extends CustomBasicException
{
    const ERROR_CODE = '0002';
    const MESSAGE_PREFIX = 'account or password fail.';
}
