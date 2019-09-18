<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\OAuth\AccessTokenController;
use App\Traits\BasicResponseTrait;
use App\Traits\RequiredParameterTrait;
use Config;
use Illuminate\Http\Request;
use Log;
use Psr\Http\Message\ServerRequestInterface;

class OAuthController extends AccessTokenController
{
    use BasicResponseTrait, RequiredParameterTrait;

    public function getTokenByClient(ServerRequestInterface $server_request, Request $request)
    {
        Log::info('class = ' . __CLASS__ . ', ' . 'method = ' . __FUNCTION__ . ', ' .
            Config::get('constants.info.client_token') . ', ' .
            'client_id = ' . $request->client_id);
        $this->verifyRequiredParameter($request, ['grant_type', 'client_id', 'client_secret', 'scope']);
        $collect = $this->getBasicResponse();
        $tokenInfo = $this->getAccesstoken($server_request);
        $items[] = $tokenInfo;
        $collect->put('items', $items);
        return $collect;
    }

    public function getTokenByApp(ServerRequestInterface $server_request, Request $request)
    {
        $collect = $this->getBasicResponse();
        $tokenInfo = $this->getAccesstoken($server_request);
        $items[] = $tokenInfo;
        $collect->put('items', $items);
        return $collect;
    }

    public function getAccesstoken(ServerRequestInterface $request)
    {
        $tokenResponse = parent::issueToken($request);
        $token = $tokenResponse->getContent();
        $tokenInfo = json_decode($token, true);
        return $tokenInfo;
    }

    public function validateClientToken()
    {
        return $this->getBasicResponse();
    }
}
