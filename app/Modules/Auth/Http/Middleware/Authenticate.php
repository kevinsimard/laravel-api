<?php

namespace App\Modules\Auth\Http\Middleware;

use App\Modules\Auth\Entities\User;

class Authenticate
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
        $apiToken = $request->input('api_token');

        $user = User::whereApiToken($apiToken)->first();

        abort_if(is_null($user), 401);

        auth()->setUser($user);

        return $next($request);
    }
}
