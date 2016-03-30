<?php

use App\Modules\Auth\Entities\User;

return [
    // authentication defaults
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'user',
    ],

    // authentication guards
    'guards' => [
        'api' => [
            'driver' => 'token',
            'provider' => 'user',
        ],
    ],

    // user providers
    // supported: "database", "eloquent"
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => User::class,
        ],
    ],

    // resetting passwords
    'passwords' => [
        'user' => [
            'provider' => 'user',
            'email' => 'auth.emails.password',
            'table' => 'password_reset',
            'expire' => 60,
        ],
    ],
];
