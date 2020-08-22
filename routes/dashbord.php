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
/* middleware guest : admin */
Route::group(['middleware' => 'guest:admin'],function(){
    Route::get('login','loginController@getLogin')->name('admin.login');
    Route::post('login','loginController@postLogin')->name('admin.post.login');
});
/* middleware guest : admin */
/* middleware auth : admin */
Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/dashbord','loginController@getDashbordPage')->name('admin.dashbord');
    Route::get('logout','loginController@logout')->name('logout');
});

/* middelware auth : admin */
