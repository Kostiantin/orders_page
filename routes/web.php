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
Route::get('/', 'OrdersController@index');

Route::post('/', 'OrdersController@index')->name('search_order');
