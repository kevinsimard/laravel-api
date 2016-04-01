<?php

namespace App\Http\Middleware;

class AssertJsonRequest
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, \Closure $next)
    {
        if (! $request->ajax() && ! $request->wantsJson() && ! $request->isJson()) {
            abort(415);
        }

        return $next($request);
    }
}
