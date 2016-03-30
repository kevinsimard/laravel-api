<?php

namespace App\Http\Middleware;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AssertJsonResponse
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        $content = $response instanceof JsonResponse
            ? $response->getData() : $response->getContent();

        if (empty($content)) {
            throw new HttpException(204);
        }

        return $next($request);
    }
}
