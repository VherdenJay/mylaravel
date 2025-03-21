<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and is an admin
        if (!Auth::check() || Auth::user()->admin != 1) {
            return redirect('/')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
