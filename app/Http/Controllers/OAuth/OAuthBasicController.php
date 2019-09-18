<?php

namespace App\Http\Controllers\OAuth;

use App\Traits\BasicResponseTrait;
use App\Traits\OAuthClientTrait;
use App\Traits\RequiredParameterTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class OAuthBasicController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,
    BasicResponseTrait, RequiredParameterTrait, OAuthClientTrait;
}
