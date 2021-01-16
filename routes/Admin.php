<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
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

Route::group(['namespace'=>'Dashboard' ,'middleware' => 'auth:admins' ,'prefix' =>'admin'],function(){

    Route::get('/','DashboardController@index')->name('admin.Dashboard');
    Route::get('logout','LoginController@logout')->name('admin.logout');

    Route::group(['prefix' =>'settings'],function (){

        Route::get('shipping-methods/{type}','SettingsController@editShippingMethods')->name('edit.shippings.methods');
        Route::put('shipping-methods/{id}','SettingsController@UpdateShippingMethods')->name('update.shippings.methods');
    });

});


Route::group(['namespace'=>'dashboard' ,'middleware'=>'guest:admins' ,'prefix' =>'admin'],function(){

    Route::get('login','LoginController@login')->name('admin.login');
    Route::post('post_login','LoginController@post_login')->name('post_login.login');

});

});
