<?php

return [
    'info' => [
        'client_token' => 'call client/token api',
        'login' => 'call login api',
        'logout' => 'call logout api',
        'member_basic-info' => 'call member/basic-info api',
        'logout_success' => 'logout success',
    ],

    'error' => [
        'scope_not_allowed' => 'scope is not allowed',
        'account_password_fail' => 'account or password fail',
        'user_not_found' => 'can not find user',
        'token_not_match_user' => 'token not match user',
        'illegal_token' => 'illegal token',
    ],

    'passport' => [
        'access_token_expired_days' => 30,
        'refresh_token_expired_days' => 60,
    ],
];
