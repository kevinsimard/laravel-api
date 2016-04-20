<?php

namespace App\Modules\Auth\Http\Middleware;

use Closure;

class Authenticate
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            abort(401);
        }

        return $next($request);
    }
}
