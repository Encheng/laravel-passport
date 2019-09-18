<?php

namespace App\Http\Controllers\OAuth;

use Laravel\Passport\Http\Controllers\AccessTokenController as PassportAccessTokenController;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;

class AccessTokenController extends PassportAccessTokenController
{
    public function issueToken(ServerRequestInterface $request)
    {
        return $this->convertResponse(
            $this->server->respondToAccessTokenRequest($request, new Psr7Response)
        );
    }
}
