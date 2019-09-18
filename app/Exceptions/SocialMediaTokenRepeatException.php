<?php

namespace App\Exceptions;

use Exception;

class SocialMediaTokenRepeatException extends Exception
{
    public $msg_bag;

    public function __construct($msg_bag = null)
    {
        $this->msg_bag = ($msg_bag === null) ? new MessageBag : $msg_bag;
    }
}
