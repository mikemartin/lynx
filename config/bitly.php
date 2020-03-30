<?php

namespace Mikemartin\Bitlynx;

return [
    /*
    |--------------------------------------------------------------------------
    | Access Token
    |--------------------------------------------------------------------------
    |
    | Enter here your access token generated from: https://bitly.com/a/oauth_apps
    */
    'accesstoken' => env('BITLY_ACCESS_TOKEN', ''),
    'enabled_env' => ['production']
    
];