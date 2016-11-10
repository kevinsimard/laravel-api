<?php

use App\Modules\Auth\Entities\User;

return [
    // authentication defaults
    "defaults" => [
        "guard" => "api",
    ],

    // authentication guards
    "guards" => [
        "api" => [
            "driver" => "token",
            "provider" => "user",
        ],
    ],

    // user providers
    // supported: "database", "eloquent"
    "providers" => [
        "user" => [
            "driver" => "eloquent",
            "model" => User::class,
        ],
    ],
];
