<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'], 'namespace' => 'Front', 'as' => 'front_'], function () {
    Route::get('/', 'DashboardController@parts')->name('home');
    Route::get('/view/{id}', 'PartsController@view')->name('parts_view');
    Route::get('/{alias}', 'PartsController@find')->name('parts_find');
});

Route::group(['middleware' => 'web', 'namespace' => 'Admin'], function() {
    Route::post('/admin/login',  'LoginController@login');
    Route::get('/admin/login',  'LoginController@showLoginForm')->name('login');
    Route::get('logout',  'LoginController@logout')->name('logout');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin_'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'products', 'as' => 'products_'], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('add', 'ProductsController@add')->name('add');
        Route::get('edit/{id}', 'ProductsController@edit')->name('edit');
        Route::post('insert', 'ProductsController@insert')->name('insert');
        Route::post('update', 'ProductsController@update')->name('update');
        Route::get('hide/{id}', 'ProductsController@hide')->name('hide');
        Route::get('show/{id}', 'ProductsController@show')->name('show');
        Route::post('cover', 'ProductsController@cover')->name('cover');
    });

    Route::group(['prefix' => 'parts', 'as' => 'parts_'], function () {
        Route::get('/', 'PartsController@index')->name('index');
        Route::get('add', 'PartsController@add')->name('add');
        Route::get('edit/{id}', 'PartsController@edit')->name('edit');
        Route::post('insert', 'PartsController@insert')->name('insert');
        Route::post('update', 'PartsController@update')->name('update');
        Route::get('hide/{id}', 'PartsController@hide')->name('hide');
        Route::get('show/{id}', 'PartsController@show')->name('show');
        Route::post('image', 'PartsController@image')->name('image');

        Route::post('import', 'PartsController@import')->name('import');
    });

    Route::group(['prefix' => 'parts/images', 'as' => 'parts_images_'], function () {
        Route::post('add', 'PartsImageController@add')->name('add');
        Route::get('remove/{id}', 'PartsImageController@remove')->name('remove');
    });
});
