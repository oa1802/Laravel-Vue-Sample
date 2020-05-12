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

#Route::get('/', function () {
#    return view('welcome');
#});

#Route::get('/test', function () {
#    return view('test');
#});

Route::get('/', 'HomeController@show')->name('home');
Route::get('/store', 'StoreController@show')->name('store');
Route::post('/payment', 'PaymentController@show')->name('payment');
Route::post('/delivery', 'DeliveryController@show')->name('delivery');
Route::post('/confirm', 'ConfirmController@show')->name('confirm');
Route::post('/complete', 'CompleteController@show')->name('complete');
Route::get('/contact', 'ContactController@show')->name('complete');
