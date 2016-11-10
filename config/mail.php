<?php

return [
    // default mail driver
    // supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "ses", "sparkpost", "log"
    "driver" => env("MAIL_DRIVER", "smtp"),

    // SMTP host address
    "host" => env("MAIL_HOST", "smtp.mailgun.org"),

    // SMTP host port
    "port" => env("MAIL_PORT", 587),

    // global "from" address
    "from" => [
        "name" => null,
        "address" => null,
    ],

    // E-Mail encryption protocol
    "encryption" => env("MAIL_ENCRYPTION", "tls"),

    // SMTP server username
    "username" => env("MAIL_USERNAME"),

    // SMTP server password
    "password" => env("MAIL_PASSWORD"),

    // Sendmail system path
    "sendmail" => "/usr/sbin/sendmail -bs",
];
