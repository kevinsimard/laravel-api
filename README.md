# Laravel Api Structure

## Code Structure

    ├── app
    │   ├── Console
    │   │   └── Kernel.php
    │   ├── Exceptions
    │   │   └── Handler.php
    │   ├── Http
    │   │   ├── Controllers
    │   │   │   └── BaseController.php
    │   │   ├── Middleware
    │   │   │   ├── AssertJsonRequest.php
    │   │   │   └── AssertJsonResponse.php
    │   │   ├── Requests
    │   │   │   └── BaseRequest.php
    │   │   └── Kernel.php
    │   ├── Jobs
    │   │   └── BaseJob.php
    │   ├── Modules
    │   │   └── Auth
    │   │       ├── Entities
    │   │       │   └── User.php
    │   │       ├── Http
    │   │       │   ├── Controllers
    │   │       │   │   ├── AuthController.php
    │   │       │   │   └── PasswordController.php
    │   │       │   └── Middleware
    │   │       │       └── Authenticate.php
    │   │       └── Providers
    │   │           └── AuthServiceProvider.php
    │   └── Providers
    │       ├── EventServiceProvider.php
    │       └── RouteServiceProvider.php
    ├── bootstrap
    │   ├── cache
    │   │   └── .gitignore
    │   ├── app.php
    │   └── autoload.php
    ├── config
    │   ├── app.php
    │   ├── auth.php
    │   ├── broadcasting.php
    │   ├── cache.php
    │   ├── compile.php
    │   ├── database.php
    │   ├── filesystems.php
    │   ├── mail.php
    │   ├── queue.php
    │   ├── services.php
    │   └── view.php
    ├── database
    │   ├── factories
    │   │   └── UserFactory.php
    │   ├── migrations
    │   │   ├── 2015_10_12_000000_create_user_table.php
    │   │   └── 2015_10_12_100000_create_password_reset_table.php
    │   ├── seeds
    │   │   ├── DatabaseSeeder.php
    │   │   └── UserSeeder.php
    │   └── .gitignore
    ├── public
    │   ├── .htaccess
    │   ├── index.php
    │   └── robots.txt
    ├── resources
    │   ├── lang
    │   │   └── en
    │   │       ├── auth.php
    │   │       ├── pagination.php
    │   │       ├── passwords.php
    │   │       └── validation.php
    │   └── views
    │       └── vendor
    │           └── .gitkeep
    ├── storage
    │   ├── app
    │   │   ├── public
    │   │   │   └── .gitignore
    │   │   └── .gitignore
    │   ├── framework
    │   │   ├── cache
    │   │   │   └── .gitignore
    │   │   ├── views
    │   │   │   └── .gitignore
    │   │   └── .gitignore
    │   └── logs
    │       └── .gitignore
    ├── tests
    │   └── TestCase.php
    ├── .editorconfig
    ├── .env.example
    ├── .gitattributes
    ├── .gitignore
    ├── .php_cs
    ├── LICENSE.txt
    ├── README.md
    ├── artisan
    ├── composer.json
    ├── composer.lock
    ├── phpunit.xml
    └── server.php

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
