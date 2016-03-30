<?php

namespace App\Http\Middleware;

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

        return $next($request);
    }
}
