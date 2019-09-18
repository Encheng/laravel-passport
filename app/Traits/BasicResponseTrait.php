<?php
namespace App\Traits;

use App;

trait BasicResponseTrait
{
    protected function getBasicResponse()
    {
        return $collect = collect([
            'success' => true,
            'code' => '0000',
            'msg' => 'success',
            'items' => []
        ]);
    }

    protected function getMissingParameterResponse($errors)
    {
        $error_message = '';
        foreach ($errors->all() as $message) {
            $error_message = $error_message . $message;
        }

        return $collect = collect([
            'success' => false,
            'code' => '0001',
            'msg' => 'missing parameter, '.$error_message,
            'items' => []
        ]);
    }

    protected function getSocialMediaTokenRepeatResponse($errors)
    {
        $error_message = '';
        foreach ($errors as $key => $message) {
            $error_message = $key . ' ' .  $message;
        }

        return $collect = collect([
            'success' => false,
            'code' => '0002',
            'msg' => 'social_media_token repeat, ' . $error_message,
            'items' => []
        ]);
    }

    protected function getCustomErrorMessageAndCodeResponse($message, $code)
    {
        return $collect = collect([
            'success' => false,
            'code' => $code,
            'msg' => $message,
            'items' => []
        ]);
    }

    protected function getUnauthenticatedResponse()
    {
        return $collect = collect([
            'success' => false,
            'code' => '0097',
            'msg' => 'unauthenticated',
            'items' => []
        ]);
    }

    protected function getInvalidScopeResponse()
    {
        return $collect = collect([
            'success' => false,
            'code' => '0098',
            'msg' => 'invalid scope',
            'items' => []
        ]);
    }

    protected function getBasicSystemErrorResponse()
    {
        return $collect = collect([
            'success' => false,
            'code' => '0099',
            'msg' => 'system error',
            'items' => []
        ]);
    }
}
