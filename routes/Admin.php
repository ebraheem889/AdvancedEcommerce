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


Route::group(['namespace'=>'Dashboard' ,'middleware' => 'auth:admins'],function(){

    Route::get('/','DashboardController@index')->name('admin.Dashboard');

});


Route::group(['namespace'=>'dashboard' ,'middleware'=>'guest:admins'],function(){

    Route::get('login','LoginController@login')->name('admin.login');
    Route::post('post_login','LoginController@post_login')->name('post_login.login');

});
