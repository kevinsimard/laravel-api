<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class AssertNonEmptyResponse
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
        $response = $next($request);

        $content = $response instanceof JsonResponse
            ? $response->getData(true) : $response->getOriginalContent();

        if (empty($content) || empty((array) $content)) {
            return response()->make(null, $response->getStatusCode());
        }

        return $response;
    }
}
