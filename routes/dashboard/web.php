<?php

Route::group(
    [
    'prefix'     => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ],
    function (){

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){

            Route::get('/','WelcomeController@index') -> name('welcome');

            //category Route
            Route::resource('categories', 'CategoryController') -> except(['show']);

            //Products Route
            Route::resource('products', 'ProductController') -> except(['show']);

            //Clients Route
            Route::resource('clients', 'ClientController') -> except(['show']);
            Route::resource('clients.orders', 'Client\OrderController') -> except(['show']);

            //orders routes
            Route::resource('orders', 'OrderController');
            Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');
            //User Route
            Route::resource('users', 'UserController') -> except(['show']);


        });//End Of Dashboard Routes

    });



