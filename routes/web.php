<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () { return view('welcome');});
Route::prefix('/customer')->name('customer.')->group(function () {
    Route::post('/dashboard',  'CustomerController@dashboard')->name('dashboard');
});
