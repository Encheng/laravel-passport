<?php

namespace App\Exceptions;

use App\Traits\BasicResponseTrait;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Laravel\Passport\Exceptions\MissingScopeException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Log;

class Handler extends ExceptionHandler
{
    use BasicResponseTrait;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof OAuthServerException) {
            $code = (string) sprintf("%04d", $exception->getCode());
            Log::error('OAuthServerException, ' . 'message = ' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'code' => $code,
                'msg' => $exception->getMessage(),
                'items' => []], 200);
        }

        if ($exception instanceof MissingScopeException) {
            return response()->json($this->getInvalidScopeResponse(), 200);
        }

        if ($exception instanceof MissingParametersException) {
            Log::error('MissingParametersException, ' . 'message = ' . $exception->msg_bag);
            return response()->json($this->getMissingParameterResponse($exception->msg_bag), 200);
        }

        if ($exception instanceof SocialMediaTokenRepeatException) {
            return response()->json($this->getSocialMediaTokenRepeatResponse($exception->msg_bag), 200);
        }

        if ($exception instanceof CustomBasicException) {
            Log::error('message = ' . $exception->getMessage());
            $code = (string) sprintf("%04d", $exception->getCode());
            $msg = $exception->formatOutputMessage($exception->getMessage());
            return response()->json($this->getCustomErrorMessageAndCodeResponse($msg, $code), 200);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json($this->getUnauthenticatedResponse(), 200);
        }

        if ($exception instanceof Exception) {
            Log::info($exception);
            return response()->json($this->getBasicSystemErrorResponse(), 500);
        }

        return parent::render($request, $exception);
    }
}
