<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application
use Illuminate\Foundation\Testing\TestCase as CoreTestCase;

abstract class TestCase extends CoreTestCase
{
    /**
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
