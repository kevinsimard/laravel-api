<?php

namespace App\Modules\Auth\Http\Middleware;

use Illuminate\Http\JsonResponse;

class Authenticate
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, \Closure $next, $guard = null)
    {
        if (\Auth::guard($guard)->guest()) {
            return new JsonResponse(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
