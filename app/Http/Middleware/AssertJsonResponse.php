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

        if (empty($response->getContent())) {
            throw new HttpException(204);
        }

        if ($response instanceof JsonResponse) {
            throw new HttpException(500);
        }

        return $next($request);
    }
}
