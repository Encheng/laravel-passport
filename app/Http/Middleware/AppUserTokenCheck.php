<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Traits\RequiredParameterTrait;
use Closure;
use Log;
use Config;

class AppUserTokenCheck
{
    use RequiredParameterTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->verifyRequiredParameter($request, ['client_id', 'client_secret', 'account', 'password']);
        $scope = env('BASIC_SCOPE');
        $grant_type = 'password';

        $request->merge([
            'grant_type' => $grant_type,
            'scope' => $scope,
            'username' => $request->account
        ]);
        unset($request['account']);

        return $next($request);
    }
}
