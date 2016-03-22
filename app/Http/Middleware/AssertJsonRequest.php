<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\HttpException;

class AssertJsonRequest
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (! $request->ajax() && ! $request->wantsJson()) {
            throw new HttpException(415);
        }

        return $next($request);
    }
}
