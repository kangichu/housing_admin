<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Settings\RouteController;

use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\Features\SubscriptionController;
use App\Http\Controllers\Features\FeatureController;
use App\Http\Controllers\Features\InvoiceController;
use App\Http\Controllers\Features\SubscriberController;

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

Auth::routes(['register' => false]);

Route::get('/', [RouteController::class, 'guard']); 

Route::get('home', [Home::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Subscriptions
|--------------------------------------------------------------------------
*/

    Route::resource('subscription', SubscriptionController::class);

        Route::put('subscription_status/{id}', [SubscriptionController::class, 'subscription_status']);

        Route::resource('feature', FeatureController::class);

        Route::resource('subscriber', SubscriberController::class);


/*
|--------------------------------------------------------------------------
| Invoices
|--------------------------------------------------------------------------
*/

    Route::resource('invoice', InvoiceController::class); 