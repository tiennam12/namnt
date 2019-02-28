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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::post('/users/update/{user}', 'UsersController@update')->name('users.update');
Route::get('/create', 'UsersController@create')->name('users.create');
Route::post('/users/create', 'UsersController@store')->name('users.store');
Route::get('/orders', 'OrdersController@index')->name('orders.index');
Route::get('/orders/{user}', 'OrdersController@show')->name('orders.show');
Route::delete('/orders/{user}', 'OrdersController@destroy')->name('orders.destroy');
Route::get('/orders/{user}/edit', 'OrdersController@edit')->name('orders.edit');
Route::post('/orders/update/{user}', 'OrdersController@update')->name('orders.update');
Route::get('/create/orders', 'OrdersController@create')->name('orders.create');
Route::post('/orders/create', 'OrdersController@store')->name('orders.store');

// Route::resource('users', 'UsersController');Orders