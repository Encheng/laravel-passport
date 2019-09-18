<?php

namespace App\Exceptions;

use Exception;

class MobileVerificationCodeNotExpriedException extends CustomBasicException
{
    const ERROR_CODE = '0003';
    const MESSAGE_PREFIX = 'verification code not expried, retry later.';
}
