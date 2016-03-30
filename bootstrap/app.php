<?php

use Illuminate\Foundation\Application;

// create the application
$app = new Application(realpath(__DIR__.'/../'));

// bind important interfaces
$app->singleton(Illuminate\Contracts\Http\Kernel::class, App\Http\Kernel::class);
$app->singleton(Illuminate\Contracts\Console\Kernel::class, App\Console\Kernel::class);
$app->singleton(Illuminate\Contracts\Debug\ExceptionHandler::class, App\Exceptions\Handler::class);

// return the application
return $app;
