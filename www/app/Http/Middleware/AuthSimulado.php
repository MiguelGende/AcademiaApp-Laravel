<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSimulado
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('auth') || !session('auth')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
