<?php

namespace Mikemartin\Bitlynx;

use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    
    protected $scripts = [
        __DIR__.'/../public/js/bitlynx.js'
    ];

    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php',
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

        $this->createNavigation();
        
    }

    private function createNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->content('Bitlynx')
                ->route('bitlynx.index')
                ->icon('paperclip');
        });
    }
    
}
