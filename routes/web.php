<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'], 'namespace' => 'Front', 'as' => 'front_'], function () {
    Route::get('/', 'DashboardController@home')->name('home');
    Route::get('/about', 'DashboardController@about')->name('dashboard_about');
    Route::get('/contacts', 'DashboardController@contacts')->name('dashboard_contacts');
    Route::get('/service', 'DashboardController@service')->name('dashboard_service');
    Route::get('/parts', 'DashboardController@parts')->name('dashboard_parts');
    Route::get('/finance', 'DashboardController@finance')->name('dashboard_finance');

    Route::get('/leasing/info', 'LeasingController@index')->name('leasing_info');
    Route::get('/leasing/calculation/{price}', 'LeasingController@calculation')->name('leasing_calculation');
    Route::get('/leasing/view/{id}', 'LeasingController@view')->name('leasing_view');
    Route::get('/leasing/select/download', 'BankController@index')->name('leasing_select_download');
    Route::get('/leasing/pdf/download', 'BankController@downdload')->name('leasing_pdf_download');


    // Route::get('/credit', 'DashboardController@credit')->name('dashboard_credit');
    Route::get('/credit/view/{id}', 'CreditController@view')->name('credit_view');
    Route::get('/credit/banks', 'CreditController@banks')->name('credit_banks');

    Route::get('/news', 'NewsController@index')->name('news_list');
    Route::get('/news/read/{id}', 'NewsController@index')->name('news_view');

    Route::post('/callback', 'CallbackController@index')->name('callback_index');

    Route::get('/configurator', 'ConfiguratorController@types')->name('configurator_index');
    Route::get('/configurator/chassis/{alias}', 'ConfiguratorController@chassis')->name('configurator_chassis');
    Route::get('/configurator/options/{typeId}/{baseId}', 'ConfiguratorController@options')->name('configurator_options');
    Route::get('/configurator/leasing/{typeId}/{baseId}', 'ConfiguratorController@leasing')->name('configurator_leasing');
    Route::get('/configurator/finish', 'ConfiguratorController@finish')->name('configurator_finish');

    Route::get('/cart', 'CartController@index')->name('cart_index');

    Route::get('search', 'SearchController@index')->name('search_index');
    Route::get('/catalog/truck/{id}', 'SearchController@view')->name('search_view');
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
});
