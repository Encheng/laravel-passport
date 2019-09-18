<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        // Passport::tokensExpireIn(Carbon::now()
        //     ->addDays(Config::get('constants.passport.access_token_expired_days')));

        // Passport::refreshTokensExpireIn(Carbon::now()
        //     ->addDays(Config::get('constants.passport.refresh_token_expired_days')));


        Passport::tokensCan([
            'sync-data' => 'sync member data and request uuid',
            'verify-member' => 'access member-verification jobs',
            'get-profile' => 'access member data',
            'basic' => 'access login, logout and register',
        ]);
    }
}
