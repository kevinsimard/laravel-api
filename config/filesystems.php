<?php

return [
    // default filesystem disk
    // supported: "local", "ftp", "s3", "rackspace"
    "default" => "local",

    // default cloud filesystem disk
    "cloud" => "s3",

    // filesystem disks
    "disks" => [
        "local" => [
            "driver" => "local",
            "root" => storage_path("app"),
        ],

        "public" => [
            "driver" => "local",
            "root" => storage_path("app/public"),
            "visibility" => "public",
        ],

        "s3" => [
            "driver" => "s3",
            "key" => "your-key",
            "secret" => "your-secret",
            "region" => "your-region",
            "bucket" => "your-bucket",
        ],
    ],
];
