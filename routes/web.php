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


/*
 * default home page
 */
Route::get('/', 'OrdersController@index')->name('home');

// search
Route::get('/search', 'OrdersController@index')->name('search_order');

// delete order
Route::get('/delete/{orderId}', 'OrdersController@deleteOrder')->name('delete_order');

// edit order
Route::get('/edit/{orderId}', 'OrdersController@editOrder')->name('edit_order');

// update order
Route::post('/update', 'OrdersController@updateOrder')->name('update_order');
