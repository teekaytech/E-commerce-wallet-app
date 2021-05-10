<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (!app()->isLocal()) {
    URL::forceScheme('https');
}

Route::get('/', function () { return view('welcome');});
Route::prefix('/customer')->name('customer.')->group(function () {
    Route::post('/login', 'CustomersController@login')->name('login');
    Route::get('/dashboard',  'CustomersController@dashboard')->name('dashboard');
    Route::get('/logout',  'CustomersController@logout')->name('logout');

    Route::get('/wallet_transfer/{id}',  'WalletsController@new_transfer')->name('new_transfer');
    Route::post('/wallet_transfer',  'WalletsController@make_transfer')->name('make_transfer');
    Route::get('/preload_wallet/{id}',  'WalletsController@load_wallet')->name('preload_wallet');
    Route::post('/preload_wallet/{id}',  'WalletsController@load_wallet')->name('preload_wallet');

    //preload wallet urls
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
});
