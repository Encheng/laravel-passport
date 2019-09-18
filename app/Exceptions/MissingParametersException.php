<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class MissingParametersException extends Exception
{
    public $msg_bag;

    public function __construct($msg_bag = null)
    {
        $this->msg_bag = ($msg_bag === null) ? new MessageBag : $msg_bag;
    }
}
