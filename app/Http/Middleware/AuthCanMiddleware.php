<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCanMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || !$request->user->hasRole($role)) {

            return response()->json(['status' => 'sem permissão.'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
