<?php

namespace App\Modules\Auth\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\HttpException;

class Authenticate
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$guards
     * @return mixed
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        if ($this->check($guards)) {
            return $next($request);
        }

        throw new HttpException(401);
    }

    /**
     * @param  array  $guards
     * @return bool
     */
    protected function check(array $guards)
    {
        if (empty($guards)) {
            return \Auth::check();
        }

        foreach ($guards as $guard) {
            if (\Auth::guard($guard)->check()) {
                return true;
            }
        }

        return false;
    }
}
