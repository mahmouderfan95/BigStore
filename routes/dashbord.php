<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| dashbord Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashbord routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
/* middleware guest : admin */
    Route::group(['middleware' => 'guest:admin','prefix' => 'admin'],function(){
        Route::get('login','loginController@getLogin')->name('admin.login');
        Route::post('login','loginController@postLogin')->name('admin.post.login');
    });
    /* middleware guest : admin */
    /* middleware auth : admin */
    Route::group(['middleware'=>'auth:admin','prefix' => 'admin'],function(){
        Route::get('/','loginController@getDashbordPage')->name('admin.dashbord');
        Route::get('logout','loginController@logout')->name('admin.logout');
        // shpping method route
        Route::group(['prefix'=> 'settings'],function(){
            Route::get('shpping-method/{type}','settingController@edit_shpping')->name('edit.shpping.method');
            Route::PUT('shpping-method/{id}','settingController@update_shpping')->name('update.shpping.method');
        });

        Route::group(['prefix' => 'profile'],function(){
            Route::get('edit/{id}','profileController@editProfile')->name("edit.profile.admin");
            Route::PUT("update/{id}",'profileController@updateProfile')->name("update.profile.admin");
        });

        Route::group(['prefix' => 'mainCategories'],function(){
            Route::get('/','mainCategoriesController@index')->name('mainCategories.index');
            Route::get("edit/{id}","mainCategoriesController@edit")->name("mainCategories.edit");
            Route::put("update/{id}","mainCategoriesController@update")->name("mainCategories.update");

        });
    });
/* middelware auth : admin */
});
