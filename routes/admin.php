<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'  =>  'admin','namespace' => 'Admin'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login.post');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        //Dashboard
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        //Settings
        Route::get('/settings', 'SettingController@index')->name('admin.settings');
        Route::post('/settings', 'SettingController@update')->name('admin.settings.update');

        //Categoreis
        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', 'CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'CategoryController@delete')->name('admin.categories.delete');
        
        });

        //Attributes
        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'AttributeController@delete')->name('admin.attributes.delete');

            //Attribute Values
            Route::post('/get-values', 'AttributeValueController@getValues');
            Route::post('/add-values', 'AttributeValueController@addValues');
            Route::post('/update-values', 'AttributeValueController@updateValues');
            Route::post('/delete-values', 'AttributeValueController@deleteValues');
        
        });
        
        Route::group(['prefix'  =>   'brands'], function() {

            Route::get('/', 'BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'BrandController@delete')->name('admin.brands.delete');
        
        });
    });

});