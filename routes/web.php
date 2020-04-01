<?php

use Statamic\Facades\OAuth;
use Mikemartin\Bitlynx\Http\Controllers\OAuthController;

Route::name('bitlynx.')->group(function () {
  Route::get(config('bitlynx.oauth.routes.login'), 'Http\Controllers\OAuthController@redirectToProvider')->name('oauth.login');
  Route::get(config('bitlynx.oauth.routes.callback'), 'Http\Controllers\OAuthController@handleProviderCallback')->name('oauth.callback');
});


