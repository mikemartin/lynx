<?php

namespace Mikemartin\Bitlynx;

use Mikemartin\Bitlynx\Modifiers\Recaptcha;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public $providers = [
        Shivella\Bitly\BitlyServiceProvider::class,
    ];

    public $aliases = [
        'Bitly' => Shivella\Bitly\Facade\Bitly::class,
    ];

    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('bitlynx.php'),
        ], 'config');
        
    }
}