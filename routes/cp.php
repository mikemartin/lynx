  
<?php

use Illuminate\Support\Facades\Route;
use Mikemartin\Bitlynx\Http\Controllers\BitlynxController;
use Mikemartin\Bitlynx\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| CP routes
|--------------------------------------------------------------------------
*/

Route::name('bitlynx.')->prefix('bitlynx')->group(function () {
  Route::get('/', [BitlynxController::class, '__invoke'])->name('index');
  Route::get('/connect', [AuthController::class, '__invoke'])->name('index');
});

