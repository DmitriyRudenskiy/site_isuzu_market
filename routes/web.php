<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['domain', 'city'], 'namespace' => 'Front'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('/catalog', 'IndexController@products');
    Route::get('/price', 'IndexController@call');
    Route::get('/leasing', 'IndexController@call');
    Route::get('/bonus', 'IndexController@call');
    Route::get('/delivery', 'IndexController@call');
    Route::post('/callback', 'IndexController@mail')->name('callback');
    Route::post('/form', 'IndexController@form');
    Route::get('/success', 'IndexController@success')->name('front_success');
    Route::get('/bitrix/code', 'BitrixController@index')->name('bitrix_code');
    Route::post('/bitrix/token/update', 'BitrixController@update')->name('bitrix_token_update');
});

Route::group(['middleware' => 'web', 'namespace' => 'Admin'], function() {
    Route::post('login',  'LoginController@login');
    Route::get('login',  'LoginController@showLoginForm')->name('login');
    Route::get('logout',  'LoginController@logout')->name('logout');
});

Route::group(['middleware' => ['domain', 'auth'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin_'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/info', 'DashboardController@info')->name('info');

    Route::group(['prefix' => 'benefits', 'as' => 'benefits_'], function () {
        Route::get('/',  'BenefitsController@index')->name('index');
        Route::get('add', 'BenefitsController@add')->name('add');
        Route::get('edit/{id}', 'BenefitsController@edit')->name('edit');
        Route::post('insert', 'BenefitsController@insert')->name('insert');
        Route::post('update', 'BenefitsController@update')->name('update');
        Route::post('cover', 'BenefitsController@cover')->name('cover');
        Route::get('hide/{id}', 'BenefitsController@hide')->name('hide');
        Route::get('show/{id}', 'BenefitsController@show')->name('show');
    });

    Route::group(['prefix' => 'headers', 'as' => 'headers_'], function () {
        Route::get('/', 'HeadersController@index')->name('index');
        Route::get('add', 'HeadersController@add')->name('add');
        Route::get('edit/{id}', 'HeadersController@edit')->name('edit');
        Route::post('insert', 'HeadersController@insert')->name('insert');
        Route::post('update', 'HeadersController@update')->name('update');
        Route::post('bg', 'HeadersController@bg')->name('bg');
        Route::get('show/{id}', 'HeadersController@show')->name('show');
    });

    Route::group(['prefix' => 'products', 'as' => 'products_'], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('add', 'ProductsController@add')->name('add');
        Route::get('edit/{id}', 'ProductsController@edit')->name('edit');
        Route::post('insert', 'ProductsController@insert')->name('insert');
        Route::post('update', 'ProductsController@update')->name('update');
        Route::post('photo', 'ProductsController@photo')->name('photo');
        Route::get('hide/{id}', 'ProductsController@hide')->name('hide');
        Route::get('show/{id}', 'ProductsController@show')->name('show');
    });

    Route::group(['prefix' => 'products/label', 'as' => 'label_'], function () {
        Route::get('/', 'LabelController@index')->name('index');
        Route::get('edit/{id}', 'LabelController@edit')->name('edit');
        Route::post('update', 'LabelController@update')->name('update');
        Route::get('hide/{id}', 'LabelController@hide')->name('hide');
        Route::get('show/{id}', 'LabelController@show')->name('show');
    });

    Route::group(['prefix' => 'menu', 'as' => 'menu_'], function () {
        Route::get('/', 'MenuController@index')->name('index');
        Route::post('insert', 'MenuController@insert')->name('insert');
        Route::post('update', 'MenuController@update')->name('update');
        Route::post('logo', 'MenuController@logo')->name('logo');
        Route::post('phone', 'MenuController@phone')->name('phone');
        Route::get('remove/{id}', 'MenuController@remove')->name('remove');
    });

    Route::group(['prefix' => 'titles', 'as' => 'titles_'], function () {
        Route::get('/', 'TitlesController@index')->name('index');
        Route::post('/title/update', 'TitlesController@update')->name('update');
    });

    Route::group(['prefix' => 'reviews', 'as' => 'reviews_'], function () {
        Route::get('/', 'ReviewsController@index')->name('index');
        Route::get('add', 'ReviewsController@add')->name('add');
        Route::get('edit/{id}', 'ReviewsController@edit')->name('edit');
        Route::post('insert', 'ReviewsController@insert')->name('insert');
        Route::post('update', 'ReviewsController@update')->name('update');
        Route::post('avatar', 'ReviewsController@avatar')->name('avatar');
        Route::get('hide/{id}', 'ReviewsController@hide')->name('hide');
        Route::get('show/{id}', 'ReviewsController@show')->name('show');
    });

    Route::group(['prefix' => 'forms', 'as' => 'forms_'], function () {
        Route::get('/', 'FormsController@index')->name('index');
        Route::get('add', 'FormsController@add')->name('add');
        Route::get('edit/{id}', 'FormsController@edit')->name('edit');
        Route::post('insert', 'FormsController@insert')->name('insert');
        Route::post('update', 'FormsController@update')->name('update');
        Route::get('hide/{id}', 'FormsController@hide')->name('hide');
        Route::get('show/{id}', 'FormsController@show')->name('show');
    });

    Route::group(['prefix' => 'video', 'as' => 'video_'], function () {
        Route::get('/', 'VideoController@index')->name('index');
        Route::get('add', 'VideoController@add')->name('add');
        Route::get('edit/{id}', 'VideoController@edit')->name('edit');
        Route::post('insert', 'VideoController@insert')->name('insert');
        Route::post('update', 'VideoController@update')->name('update');
        Route::get('hide/{id}', 'VideoController@hide')->name('hide');
        Route::get('show/{id}', 'VideoController@show')->name('show');
    });

    Route::group(['prefix' => 'sites', 'as' => 'sites_'], function () {
        Route::get('/', 'SitesController@index')->name('index');
        Route::post('insert', 'SitesController@insert')->name('insert');
        Route::post('update', 'SitesController@update')->name('update');
    });

    Route::group(['prefix' => 'phones', 'as' => 'phones_'], function () {
        Route::get('/', 'PhonesController@index')->name('index');
    });
});

