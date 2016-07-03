<?php

return [
    // default queue driver
    // supported: "null", "sync", "database", "beanstalkd", "sqs", "redis"
    'default' => env('QUEUE_DRIVER', 'sync'),

    // queue connections
    'connections' => [
        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'job',
            'queue' => 'default',
            'expire' => 90,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'ttr' => 90,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => 'your-public-key',
            'secret' => 'your-secret-key',
            'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
            'queue' => 'your-queue-name',
            'region' => 'us-east-1',
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => 'default',
            'expire' => 90,
        ],
    ],

    // failed queue jobs
    'failed' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_job',
    ],
];
