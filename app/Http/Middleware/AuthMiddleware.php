<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Simple authentication check (you can customize this)
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Vous devez être connecté');
        }

        return $next($request);
    }
}
