<?php

namespace App\Http\Middleware;

use Illuminate\Http\JsonResponse;

class AssertRequestIsAjax
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (! $request->ajax() && ! $request->wantsJson()) {
            return new JsonResponse(['message' => 'Bad Request'], 400);
        }

        return $next($request);
    }
}
