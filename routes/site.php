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
        });

        Route::group(['prefix' => 'site', 'middleware' => 'guest'],function(){
            // pages when user guest

        });

        // home page
        Route::get('/','siteController@homepage')->name('site.homepage');
        Route::get('category/{slug}','categoryController@productBySlug')->name('site.category');
        Route::get('product/{slug}','categoryController@productDetails')->name('site.productdetails');
});

