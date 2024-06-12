<?php

use App\Http\Middleware\CheckIsActive;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\UserAkses;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'UserAkses' => UserAkses::class,
            'isUser' => isUser::class,
            'isAdmin' => isAdmin::class,
            'is_active' => CheckIsActive::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
