<?php

use App\Http\Controllers\Site\siteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['prefix' => 'site', 'middleware' => 'auth:web'],function(){
            // pages when user auth
            Route::post('wishlists','wishlistController@store')->name('wishlist.store');
            Route::delete('wishlists','wishlistController@destroy')->name('wishlist.destroy');
            Route::get('wishlists/products','wishlistController@index')->name('wishlist.index');

            // add to cart routes
            Route::group(['prefix' => 'cart'],function(){
                Route::get('/','cartController@index')->name('cart.index');
                Route::post('add/{slug?}', 'cartController@postAdd')->name('cart.add');
                Route::post('update/{slug}', 'cartController@postUpdate')->name('cart.update');
                Route::post('update-all', 'cartController@postUpdateAll')->name('cart.update-all');
            });
            Route::group(['prefix' => 'payment'], function () {
                Route::get('/{amount}', 'PaymentController@getPayments') -> name('payment');
                Route::post('/', 'PaymentController@processPayment') -> name('payment.process');
            });
        });

        Route::group(['prefix' => 'site', 'middleware' => 'guest'],function(){
            // pages when user guest

        });

        // home page
        Route::get('/','siteController@homepage')->name('site.homepage');
        Route::get('category/{slug}','categoryController@productBySlug')->name('site.category');
        Route::get('product/{slug}','categoryController@productDetails')->name('site.productdetails');
});

