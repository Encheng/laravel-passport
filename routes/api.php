<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('app')->group(function () {

    Route::prefix('v1.0')->group(function () {

        //grant_type = password, check password
        Route::post('user/token', 'OAuth\OAuthController@getTokenByApp')
            ->name('app.user.token')->middleware('app-user-token-check');

        //grant_type = refresh
        Route::post('refresh/token', 'OAuth\OAuthController@getTokenByApp')
            ->name('app.refresh.token')->middleware('app-refresh-token-check');

        //grant_type = password, no password check
        Route::post('uuid/token', 'OAuth\OAuthController@getTokenByApp')
            ->name('app.uuid.token')->middleware('app-uuid-token-check');

        //以下尚未實作
        Route::group(['middleware' => 'client:basic'], function () {
            Route::post('login', 'OAuth\LoginController@login')->name('app.login');
            Route::get('logout', 'OAuth\LoginController@logout')->name('app.logout');
        });

        Route::group(['prefix' => 'member'], function () {
            Route::group(['middleware' => 'client:get-profile'], function () {
                Route::post('basic-info', 'OAuth\MemberController@getMemberBasicInfo')
                    ->name('app.member.basic-info')->middleware('app-token-match-user-check');
                Route::post('related-info', 'OAuth\MemberController@getMemberRelatedInfo')
                    ->name('app.member.related-info')->middleware('app-token-match-user-check');
            });
        });
    });
});
