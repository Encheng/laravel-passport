<?php

namespace App\Http\Middleware;

use App\Exceptions\TokenNotMatchUserException;
use App\Traits\OAuthClientTrait;
use App\Traits\RequiredParameterTrait;
use Closure;
use Config;
use Illuminate\Http\Request;
use Log;

class AppTokenMatchUserCheck
{
    use RequiredParameterTrait, OAuthClientTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->user_id)) {
            return $next($request);
        }

        $user = $this->getUserFromBearerToken($request);

        if (empty($user)) {
            return $next($request);
        }

        if ($request->user_id != $user->id) {
            Log::error('class = ' . __CLASS__ . ', ' . 'method = ' . __FUNCTION__ . ', ' .
                Config::get('constants.error.token_not_match_user') . ', ' .
                'user_id =' . $request->user_id . ', ' .
                'user_id_from_token = ' . $user->id);
            $msg = TokenNotMatchUserException::MESSAGE_PREFIX;
            $code = TokenNotMatchUserException::ERROR_CODE;
            throw new TokenNotMatchUserException($msg, $code);
        }

        return $next($request);
    }
}
