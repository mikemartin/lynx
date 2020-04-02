<?php

namespace Mikemartin\Bitlynx;

use Statamic\Facades\Utility;
use Mikemartin\Bitlynx\Http\Controllers\Auth\AuthController;
use Mikemartin\Bitlynx\Providers\EventServiceProvider;
use SocialiteProviders\Manager\ServiceProvider as SocialiteServiceProvider;
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

        $this->publishes([
            __DIR__.'/../config/bitly.php' => config_path('bitly.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../config/bitlynx/oauth.php' => config_path('bitlynx/oauth.php'),
        ], 'config');

        $this->registerUtility();

        
    }

    public function register()
    {
        $this->app->register(SocialiteServiceProvider::class);
        $this->app->register(EventServiceProvider::class);

        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/bitly.php', 'bitly');
        }

        config(['services.bitly' => config('bitlynx.oauth.bitly')]);
        
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
