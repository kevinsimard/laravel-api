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
        \App\Http\Middleware\AssertRequestIsAjax::class,
    ];

    /**
     * @var array
     */
    protected $middlewareGroups = [
        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Modules\Auth\Http\Middleware\Authenticate::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
