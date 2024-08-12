<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            throw new AuthenticationException();
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            throw new NotFoundHttpException();
        });

        $this->renderable(function (AccessDeniedException $e, $request) {
            throw new \App\Exceptions\AccessDeniedException();
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
