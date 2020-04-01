<?php

use Statamic\Facades\OAuth;

Route::name('bitlynx.')->group(function () {
  Route::get(config('bitlynx.oauth.routes.login'), 'OAuthController@redirectToProvider')->name('oauth.login');
  Route::get(config('bitlynx.oauth.routes.callback'), 'OAuthController@handleProviderCallback')->name('oauth.callback');
});


