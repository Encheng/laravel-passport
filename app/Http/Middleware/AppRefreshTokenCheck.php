<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Traits\RequiredParameterTrait;
use Closure;
use Log;
use Config;

class AppRefreshTokenCheck
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
        $this->verifyRequiredParameter($request, ['client_id', 'client_secret', 'refresh_token']);

        $scope = env('BASIC_SCOPE');
        $grant_type = 'refresh_token';

        $request->merge([
            'grant_type' => $grant_type,
            'scope' => $scope
        ]);

        return $next($request);
    }
}
