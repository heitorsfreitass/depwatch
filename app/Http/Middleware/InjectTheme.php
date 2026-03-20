<?php

use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request;
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