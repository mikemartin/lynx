  
<?php

use Illuminate\Support\Facades\Route;
use Mikemartin\Bitlynx\Http\Controllers\BitlynxController;

/*
|--------------------------------------------------------------------------
| CP routes
|--------------------------------------------------------------------------
*/

Route::name('bitlynx.')->prefix('bitlynx')->group(function () {
  Route::get('/', [BitlynxController::class, '__invoke'])->name('index');
});
