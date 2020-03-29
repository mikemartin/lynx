<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Shivella\Bitly\Testing\BitlyClientFake;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        // swap Bitly client by a fake
        $app->singleton('bitly', function () {
            return new BitlyClientFake();
        });

        return $app;
    }
}