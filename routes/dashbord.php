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
            Route::get('create','mainCategoriesController@create')->name('mainCategories.create');
            Route::post('store','mainCategoriesController@store')->name('mainCategories.store');
            Route::get("edit/{id}","mainCategoriesController@edit")->name("mainCategories.edit");
            Route::put("update/{id}","mainCategoriesController@update")->name("mainCategories.update");
            Route::get('delete/{id}','mainCategoriesController@destroy')->name('mainCategories.destroy');
        });

        Route::group(['prefix' => 'subCategories'],function(){
            Route::get('/','SubCategoryController@index')->name('subCategories.index');
            Route::get('create','SubCategoryController@create')->name('subCategories.create');
            Route::post('store','SubCategoryController@store')->name('subCategories.store');
            Route::get("edit/{id}","SubCategoryController@edit")->name("subCategories.edit");
            Route::put("update/{id}","SubCategoryController@update")->name("subCategories.update");
            Route::get('delete/{id}','SubCategoryController@destroy')->name('subCategories.destroy');
        });
        Route::group(['prefix' => 'brands'],function(){
            Route::get('/','brandController@index')->name('brands.index');
            Route::get('create','brandController@create')->name('brands.create');
            Route::post('store','brandController@store')->name('brands.store');
            Route::get("edit/{id}","brandController@edit")->name("brands.edit");
            Route::put("update/{id}","brandController@update")->name("brands.update");
            Route::get('delete/{id}','brandController@destroy')->name('brands.destroy');
        });
        /* ======== tags ======= */
        Route::group(['prefix' => 'tags'],function(){
            Route::get('/','TagController@index')->name('tags.index');
            Route::get('create','TagController@create')->name('tags.create');
            Route::post('store','TagController@store')->name('tags.store');
            Route::get("edit/{id}","TagController@edit")->name("tags.edit");
            Route::put("update/{id}","TagController@update")->name("tags.update");
            Route::get('delete/{id}','TagController@destroy')->name('tags.destroy');
        });
        /* ======== tags ======= */


        /* ================ products ============ */
        Route::group(['prefix' => 'product'], function () {
            Route::get('/','productController@index')->name('product.index');
            Route::get('create','productController@create')->name('product.general.create');
            Route::post('store','productController@store')->name('product.general.store');

            Route::get('price/{id}','productController@getPrice')->name('product.price.create');
            Route::post('price','productController@postPrice')->name('product.price.store');

            Route::get('stock/{id}','productController@getStock')->name('product.stock.create');
            Route::post('stock','productController@postStock')->name('product.stock.store');

            Route::get('images/{id}','productController@getImages')->name('product.images.create');
            Route::post('images','productController@saveImages')->name('product.images.store');
            Route::post('images/save_database','productController@saveImageDB')->name('product.images.store.db');
        });
        /* ================ products ============ */

        /* ================ Attribute routes ===========*/
        Route::group(['prefix' => 'attribute'],function () {
            Route::get('/','attributeController@index')->name('attribute.index');
            Route::get('create','attributeController@create')->name('attribute.create');
            Route::post('store','attributeController@store')->name('attribute.store');
            Route::get('edit/{id}','attributeController@edit')->name('attribute.edit');
            Route::put('update/{id}','attributeController@update')->name('attribute.update');
            Route::get('delete/{id}','attributeController@destroy')->name('attribute.destroy');
        });

        /* ================ Option routes ===========*/
        Route::group(['prefix' => 'option'],function () {
            Route::get('/','OptionController@index')->name('options.index');
            Route::get('create','OptionController@create')->name('option.create');
            Route::post('store','OptionController@store')->name('option.store');
            Route::get('edit/{id}','OptionController@edit')->name('option.edit');
            Route::put('update/{id}','OptionController@update')->name('option.update');
            Route::get('delete/{id}','OptionController@destroy')->name('option.destroy');
        });
    });
/* middelware auth : admin */
});
