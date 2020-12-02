<?php

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
        });

        Route::group(['prefix' => 'site', 'middleware' => 'guest:web'],function(){
            // pages when user guest

        });



});
Route::get('/', function () {
    return view('site.home');
});
