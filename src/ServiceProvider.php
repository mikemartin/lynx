<?php

namespace Mikemartin\Bitlynx;

use Statamic\Facades\Utility;
use Mikemartin\Bitlynx\Http\Controllers\Auth\AuthController;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    
    protected $scripts = [
        __DIR__.'/../public/js/bitlynx.js'
    ];

    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php',
        'web' => __DIR__ . '/../routes/web.php',
    ];

    protected $modifiers = [
        Modifiers\Bitlynx::class,
    ];
    
    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'bitlynx');

        /* TODO: Map config file */
        $this->publishes([
            __DIR__.'/../config/bitly.php' => config_path('bitly.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../config/bitlynx/oauth.php' => config_path('bitlynx/oauth.php'),
        ], 'config');

        $this->registerUtility();
        
    }

    private function registerUtility(): void
    {
        $utility = Utility::make('bitlynx')
            ->action(AuthController::class)
            ->icon('paperclip')
            ->description('View and copy your Bitly shortened links.');

        $utility->register();
    }
    
}
