<?php

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

// use Symfony\Component\Routing\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// User
Route::get('/', 'HomeController@index')
        ->name('home');

Route::get('/detail/{slug}', 'DetailController@index')
        ->name('detail');

Route::post('/checkout/{id}', 'CheckoutController@process')
        ->name('checkout_process')
        ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', 'CheckoutController@index')
        ->name('checkout')
        ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{id}', 'CheckoutController@create')
        ->name('checkout-create')
        ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
        ->name('checkout-remove')
        ->middleware(['auth', 'verified']);

Route::get('checkout/confirm/{id}', 'CheckoutController@success')
        ->name('checkout-success')
        ->middleware(['auth', 'verified']);

Route::get('/success', 'SuccessController@index')
        ->name('success');

// Admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes(['verify' => true ]);

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/halo', function () {
//     return 'Hallo World';
// });
