<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// register the auto loader
require __DIR__.'/../bootstrap/autoload.php';

// bootstrap the framework
$app = require_once __DIR__.'/../bootstrap/app.php';

// run the application
$kernel = $app->make(Kernel::class);

$response = $kernel->handle($request = Request::capture());
$response->send();

$kernel->terminate($request, $response);
