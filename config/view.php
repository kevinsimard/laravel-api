<?php

return [
    // view storage paths
    'paths' => [
        realpath(base_path('resources/views')),
    ],

    // compiled view path
    'compiled' => realpath(storage_path('framework/views')),
];
