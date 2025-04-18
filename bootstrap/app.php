<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
=======
>>>>>>> e2a8b4e (Primer commit)

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
<<<<<<< HEAD
        api: __DIR__.'/../routes/api.php',
=======
>>>>>>> e2a8b4e (Primer commit)
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
<<<<<<< HEAD
        // Add global middleware (applied to all requests)
        $middleware->prepend([
            \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
            \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
            \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);

        //Define API middleware
        $apiMiddleware = [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ];

        // Apply API middleware to the API routes
        Route::middleware($apiMiddleware)->group(function () {
            // Your API routes will be defined here, or you can load them from api.php
            require base_path('routes/api.php');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Configure exception handling if needed
    })
    ->create();
=======
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
>>>>>>> e2a8b4e (Primer commit)
