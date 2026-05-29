<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // 🛠️ BYPASS 419 ERROR FOR CONTACT FORM
        $middleware->validateCsrfTokens(except: [
            'contact', // Excludes http://127.0.0.1:8000/contact from CSRF checks
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
