<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))

    // ✅ Routing untuk web, console, dan health
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    // ✅ Middleware
    ->withMiddleware(function (Middleware $middleware) {
        // Alias middleware custom
        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);

        // (opsional) bikin group middleware biar rapi
        $middleware->group('admin', [
            'auth',
            'role:Admin',
        ]);

        $middleware->group('public', [
            'auth',
            'role:Public',
        ]);
    })

    // ✅ Handler untuk error/exception
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();
