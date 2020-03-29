<?php

namespace Mikemartin\Bitlynx;

use Shivella\Bitly\BitlyServiceProvider;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    
    protected $modifiers = [
        Modifiers\Bitlynx::class,
    ];
    

    /**
     * Register the Service Provider
     *
     * @var array
     */
    public $bindings = [
        ServerProvider::class => BitlyServiceProvider::class,
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
