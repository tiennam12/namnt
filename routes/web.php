<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
<<<<<<< HEAD
Route::get('/', 'ProductsController@index')->name('products.index');
=======

Route::get('/', function () {
    return view('welcome');
});

>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/create', 'UsersController@create');
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::post('/users/{user}', 'UsersController@update')->name('users.update');


    Route::post('/orders', 'OrdersController@store')->name('orders.store');
    Route::get('/orders/create', 'OrdersController@create')->name('orders.create');
    Route::get('/orders/{user}', 'OrdersController@show')->name('orders.show');
    Route::post('/orders/cancelled/{order}', 'OrdersController@cancelled')->name('orders.cancelled');

<<<<<<< HEAD
=======
    Route::get('/products', 'ProductsController@index')->name('products.index');
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a
    Route::post('/products', 'ProductsController@store')->name('products.store');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::delete('/products/{product}', 'ProductsController@destroy')->name('products.destroy');
    Route::get('/products/{id}','ProductsController@show')->name('products.show');
    Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
    Route::post('/products/update', 'ProductsController@update')->name('products.update');
});
