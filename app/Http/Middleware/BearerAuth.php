<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BearerAuth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken() != config('auth.bearer'))
        {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}
