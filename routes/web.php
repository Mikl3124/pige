<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::post('/api', 'App\Http\Controllers\LbcController@index')->name('api');
Route::post('/send-sms', 'App\Http\Controllers\LbcController@send')->name('send-sms');
Route::post('/paiement', 'App\Http\Controllers\PaiementController@index')->name('paiement');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/card', [App\Http\Controllers\HomeController::class, 'card'])->name('card');

Route::get('/subscription/create', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription.create');
Route::post('order-post', [App\Http\Controllers\SubscriptionController::class, 'orderPost'])->name('order-post');
