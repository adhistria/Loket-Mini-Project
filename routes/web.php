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
Route::get('/location','LocationController@index')->name('get_location');
Route::post('/location','LocationController@store')->name('store_location');
Route::put('/location/{id}','LocationController@update')->name('update_location');