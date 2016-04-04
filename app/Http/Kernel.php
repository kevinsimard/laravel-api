<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as CoreKernel;

class Kernel extends CoreKernel
{
    /**
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * @var array
     */
    protected $middlewareGroups = [
        'api' => [
            'throttle:60,1',
            \App\Http\Middleware\AssertJsonRequest::class,
            \App\Http\Middleware\AssertJsonResponse::class,
        ],
    ];

    /**
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Modules\Auth\Http\Middleware\Authenticate::class,
        'can' => \Illuminate\Foundation\Auth\Access\Middleware\Authorize::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
