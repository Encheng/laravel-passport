<?php
namespace App\Traits;

use App;

trait OAuthClientTrait
{
    public function getClientId($request)
    {
        if (empty($request->bearerToken())) {
            return;
        }
        $bearerToken = $request->bearerToken();
        $tokenId = (new \Lcobucci\JWT\Parser())->parse($bearerToken)->getHeader('jti');
        $client = \Laravel\Passport\Token::find($tokenId)->client;
        return $client->id;
    }

    public function getUserFromBearerToken($request)
    {
        if (empty($request->bearerToken())) {
            return;
        }
        $bearerToken = $request->bearerToken();
        $tokenId = (new \Lcobucci\JWT\Parser())->parse($bearerToken)->getHeader('jti');
        $user = \Laravel\Passport\Token::find($tokenId)->user;
        return $user;
    }
}
