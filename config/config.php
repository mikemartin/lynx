<?php

namespace Mikemartin\Bitlynx;

return [

    /*
    |--------------------------------------------------------------------------
    | Register the Service Provider
    |--------------------------------------------------------------------------
    */

    'providers' => [
      Shivella\Bitly\BitlyServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Access Token
    |--------------------------------------------------------------------------
    |
    | Enter here your access token generated from: https://bitly.com/a/oauth_apps
    */
    'accesstoken' => env('BITLY_ACCESS_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | Register Facade
    |--------------------------------------------------------------------------
    |
    | Configure the Bitly Facade
    */

    'aliases' => [
      'Bitly' => Shivella\Bitly\Facade\Bitly::class,
    ],

];