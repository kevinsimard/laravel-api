<?php

return [
    // default broadcaster
    // supported: "pusher", "redis", "log"
    'default' => env('BROADCAST_DRIVER', 'pusher'),

    // broadcast connections
    'connections' => [
        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_KEY'),
            'secret' => env('PUSHER_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                //
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],
    ],
];
