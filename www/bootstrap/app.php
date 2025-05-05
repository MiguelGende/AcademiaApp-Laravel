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
    ->withMiddleware(function (Middleware $middleware) {
        // Registrar alias personalizados de middleware
        $middleware->alias([
            'auth.simulado' => \App\Http\Middleware\AuthSimulado::class,  // Aquí debe coincidir el nombre del middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Aquí puedes manejar excepciones personalizadas si lo necesitas
    })
    ->create();
