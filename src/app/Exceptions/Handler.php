<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ErrorException;
use Symfony\Component\ErrorHandler\Error\FatalError;

use URL;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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

        $this->renderable(function(Exception $ex, $request) {
            return $this->handleException($request, $ex);
        });
    }

    public function handleException($request, Exception $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof NotFoundHttpException) {
                $response = [
                    'success' => false,
                    'message' => 'The specified URL cannot be found'
                ];

                return response($response, 404);
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                $response = [
                    'success' => false,
                    'message' => 'Method not allowed'
                ];

                return response($response, 405);
            }

            if ($exception instanceof InvalidArgumentException) {
                $response = [
                    'success' => false,
                    'message' => 'Invalid argument'
                ];

                return response($response, 500);
            }

            if ($exception instanceof BadRequestHttpException) {
                $response = [
                    'success' => false,
                    'message' => 'Bad request'
                ];

                return response($response, 400);
            }

            if ($exception instanceof AccessDeniedHttpException) {
                $response = [
                    'success' => false,
                    'message' => 'Access denied'
                ];

                return response($response, 401);
            }

            $response = [
                'success' => false,
                'message' => $exception->getMessage().' in file '.$exception->getFile().' at line '.$exception->getLine()
            ];

            return response($response, 500);
        }
    }
}
