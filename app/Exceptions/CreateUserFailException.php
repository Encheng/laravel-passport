<?php

namespace App\Exceptions;

use Exception;

class CreateUserFailException extends CustomBasicException
{
    const ERROR_CODE = '0094';
    const MESSAGE_PREFIX = 'create user fail: ';
}
