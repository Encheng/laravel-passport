<?php

namespace App\Exceptions;

use Exception;

class MobileFormatNotCorrectException extends CustomBasicException
{
    const ERROR_CODE = '0095';
    const MESSAGE_PREFIX = 'mobile format not correct: ';
}
