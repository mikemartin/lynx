<?php

namespace Mikemartin\Bitlynx\Providers;

use Statamic\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
      \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // add your listeners (aka providers) here
        'SocialiteProviders\\Bitly\\BitlyExtendSocialite@handle',
      ],
    ];
}
