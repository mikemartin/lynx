<?php


return [

    'enabled' => true,

    'providers' => [
      \SocialiteProviders\Manager\ServiceProvider::class
    ],

    'bit.ly' => [
      'client_id' => env('BITLY_CLIENT_ID'),
      'client_secret' => env('BITLY_CLIENT_SECRET'),
      'redirect' => env('APP_URL').'/oauth/bitly/callback',
    ],

    'routes' => [
        'login' => 'oauth/{provider}',
        'callback' => 'oauth/{provider}/callback'
    ],

];