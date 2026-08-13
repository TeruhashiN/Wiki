<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth('bloom')->check() || auth('bloom')->user()->role !== 'admin') {
            return redirect()->route('dashboard')
                ->withErrors(['error' => 'You do not have permission to access this page.']);
        }

        return $next($request);
    }
}
