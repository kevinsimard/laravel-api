<?php

namespace App\Http\Middleware;

use Illuminate\Http\JsonResponse;

class AssertJsonResponse
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
        $response = $next($request);

        if (! $response instanceof JsonResponse) {
            $content = $response->getContent();

            abort_if(empty($content), 204);
            abort_if(is_null(json_decode($content)), 400);
        }

        return $next($request);
    }
}
