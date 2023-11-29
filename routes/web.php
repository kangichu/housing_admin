<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Settings\RouteController;

use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\Features\SubscriptionController;
use App\Http\Controllers\Features\FeatureController;
use App\Http\Controllers\Features\InvoiceController;
use App\Http\Controllers\Features\SubscriberController;
use App\Http\Controllers\Features\DescriptionController;
use App\Http\Controllers\Features\MemberController;
use App\Http\Controllers\Features\CommunicationController;
use App\Http\Controllers\Features\TicketController;

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

        Route::post('subscription_limits', [SubscriptionController::class, 'subscription_limits']);

        Route::resource('feature', FeatureController::class);

            Route::post('bulk/feature/delete', [FeatureController::class, 'bulk_destroy']); // Deletes bulk Bookmarks

            Route::post('subscription_features', [FeatureController::class, 'subscription_features']);

        Route::resource('subscriber', SubscriberController::class);


/*
|--------------------------------------------------------------------------
| Invoices
|--------------------------------------------------------------------------
*/

    Route::resource('invoice', InvoiceController::class); 


/*
|--------------------------------------------------------------------------
| Descriptions
|--------------------------------------------------------------------------
*/

    Route::resource('descriptions', DescriptionController::class); 


/*
|--------------------------------------------------------------------------
| Members
|--------------------------------------------------------------------------
*/

    Route::resource('members', MemberController::class); 

        Route::post('/export', [MemberController::class, 'export'])->name('export');

/*
|--------------------------------------------------------------------------
| Members
|--------------------------------------------------------------------------
*/

    Route::resource('communications', CommunicationController::class); 


/*
|--------------------------------------------------------------------------
| Tickets
|--------------------------------------------------------------------------
*/

    Route::resource('tickets', TicketController::class); 
