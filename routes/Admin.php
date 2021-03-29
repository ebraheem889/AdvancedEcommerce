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
    ],
    function () {

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

            Route::group(['prefix' => 'products'], function () {
                Route::get('/', 'ProductController@index')->name('admin.products');
                Route::get('general-information/', 'ProductController@create')->name('admin.products.create');
                Route::post('store-general-information/', 'ProductController@store')->name('admin.products.store');

                Route::get('price/{id}', 'ProductController@getprice')->name('admin.products.price');
                Route::post('price', 'ProductController@saveProductPrice')->name('admin.products.price.store');

                Route::get('stock/{id}', 'ProductController@getstock')->name('admin.products.stock');
                Route::post('stock', 'ProductController@savestock')->name('admin.products.stock.store');

                Route::get('images/{id}', 'ProductController@addImages')->name('admin.products.images');
                Route::post('/images', 'ProductController@saveProductImages')->name('admin.products.images.store');
                Route::post('images/db', 'ProductController@saveProductImagesDB')->name('admin.products.images.store.db');
            });
            //end of Product routes

            Route::group(['prefix' => 'attributes'], function () {
                Route::get('/', 'AttributesController@index')->name('admin.attributes');
                Route::get('create', 'AttributesController@create')->name('admin.attributes.create');
                Route::post('store', 'AttributesController@store')->name('admin.attributes.store');
                Route::get('delete/{id}', 'AttributesController@destroy')->name('admin.attributes.delete');
                Route::get('edit/{id}', 'AttributesController@edit')->name('admin.attributes.edit');
                Route::post('update/{id}', 'AttributesController@update')->name('admin.attributes.update');
            });
            // end of attributes


            Route::group(['prefix' => 'options'], function () {
                Route::get('/', 'OptionsController@index')->name('admin.options');
                Route::get('create', 'OptionsController@create')->name('admin.options.create');
                Route::post('store', 'OptionsController@store')->name('admin.options.store');
                Route::get('delete/{id}', 'OptionsController@destroy')->name('admin.options.delete');
                Route::get('edit/{id}', 'OptionsController@edit')->name('admin.options.edit');
                Route::post('update/{id}', 'OptionsController@update')->name('admin.options.update');
            });
            // end of options
        });


        Route::group(['namespace' => 'dashboard', 'middleware' => 'guest:admins', 'prefix' => 'admin'], function () {

            Route::get('login', 'LoginController@login')->name('admin.login');
            Route::post('post_login', 'LoginController@post_login')->name('post_login.login');
        });
    }
);
