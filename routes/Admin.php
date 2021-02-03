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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admins', 'prefix' => 'admin'], function () {

        Route::get('/', 'DashboardController@index')->name('admin.Dashboard');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');

        Route::group(['prefix' => 'settings'], function () {

            Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shippings.methods');
            Route::put('shipping-methods/{id}', 'SettingsController@UpdateShippingMethods')->name('update.shippings.methods');
        });

        // end of settings routes

        Route::group(['prefix' => 'profile'], function () {

            Route::get('profile', 'ProfileController@editprofile')->name('edit.profile');
            Route::put('update/{id}', 'ProfileController@Updateprofile')->name('update.profile');
        });

        // end of profile routes

        //start categories
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/{type}/', 'CategoryController@index')->name('admin.categories');
            Route::get('/create/{type}', 'CategoryController@create')->name('admin.categories.create');
            Route::post('/store/{type}', 'CategoryController@store')->name('admin.categories.store');

            Route::get('/edit/{id}/{type}', 'CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update/{id}/{type}', 'CategoryController@update')->name('admin.categories.update');
            Route::get('/delete/{id}/{type}', 'CategoryController@destroy')->name('admin.categories.destroy');
            Route::get('/changeStatus/{id}/{type}', 'CategoryController@changeStatus')->name('admin.categories.changeStatus');

        });
        // end categories

        Route::group(['prefix' => 'brands'], function () {
            Route::get('/', 'BrandController@index')->name('admin.brands');
            Route::get('/create/', 'BrandController@create')->name('admin.brands.create');
            Route::post('/store/', 'BrandController@store')->name('admin.brands.store');

            Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brands.edit');
            Route::post('/update/{id}', 'BrandController@update')->name('admin.brands.update');
            Route::get('/delete/{id}', 'BrandController@destroy')->name('admin.brands.destroy');
        });
        //end of brands routes

        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', 'TagsController@index')->name('admin.tags');
            Route::get('/create/', 'TagsController@create')->name('admin.tags.create');
            Route::post('/store/', 'TagsController@store')->name('admin.tags.store');

            Route::get('/edit/{id}', 'TagsController@edit')->name('admin.tags.edit');
            Route::post('/update/{id}', 'TagsController@update')->name('admin.tags.update');
            Route::get('/delete/{id}', 'TagsController@destroy')->name('admin.tags.destroy');
        });
        //end of tags routes
    });


    Route::group(['namespace' => 'dashboard', 'middleware' => 'guest:admins', 'prefix' => 'admin'], function () {

        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('post_login', 'LoginController@post_login')->name('post_login.login');

    });

});
