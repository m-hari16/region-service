<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Common\BaseResponse\ResponseBuilder;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $exception) {
            if ( $exception instanceof NotFoundHttpException ) {
                return response()->json(ResponseBuilder::build(
                    404, 
                    false, 
                    "Not found"),
                404);
            }

            if ( $exception instanceof AuthenticationException ) {
                return response()->json(ResponseBuilder::build(
                    401, 
                    false, 
                    "Unauthorized"),
                401);
            }

            if ($exception instanceof ValidationException) {
                return response()->json(ResponseBuilder::build(
                    400, 
                    false, 
                    $exception->validator->errors()->first()),
                400);
            }

            if ($exception instanceof ModelNotFoundException) {
                return response()->json(ResponseBuilder::build(
                    404,
                    false,
                    'Data not found'),
                404);
            }

            Log::error($exception);
            return response()->json(ResponseBuilder::build(
                    500, 
                    false, 
                    'Please contact your developer'), 
                500);
        });
    }
}
