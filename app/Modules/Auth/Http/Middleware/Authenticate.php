<?php

namespace App\Modules\Auth\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\HttpException;

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
            throw new HttpException(401);
        }

        return $next($request);
    }
}
