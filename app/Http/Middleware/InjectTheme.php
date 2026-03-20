<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class InjectTheme
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()) {
            Inertia::share('theme', $request->user()->theme);
        }

        return $next($request);
    }
}