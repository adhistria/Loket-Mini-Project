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
//Route::group(['middleware' => 'https'], function() {

//page
    Route::get('/', 'PageController@home')->name('home')->middleware('guest');

//Auth
    Route::get('/login', 'Auth\LoginController@redirectToProvider')->name('login');
    Route::get('/callback', 'Auth\LoginController@handleProviderCallback')->name('callback');

//detail_event
    Route::get('/event/{id}', 'EventController@show')->name('show_event');

    Route::middleware(['middleware' => 'auth'])->group(function () {

        Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

        //Event
        Route::get('/event', 'EventController@index')->name('get_event');
        Route::post('/event', 'EventController@store')->name('store_event');
        Route::put('/event/{id}', 'EventController@update')->name('update_event');
        Route::get('/event/{id}/ticket', 'EventController@show_ticket')->name('show_ticket');
        Route::post('/tweet/{id}', 'EventController@tweet')->name('tweet');


        //location
        Route::get('/location', 'LocationController@index')->name('get_location');
        Route::post('/location', 'LocationController@store')->name('store_location');
        Route::put('/location/{id}', 'LocationController@update')->name('update_location');


        //ticket
        Route::get('/ticket', 'TicketController@index')->name('get_ticket');
        Route::post('/ticket', 'TicketController@store')->name('store_ticket');
        Route::put('/ticket/{id}', 'TicketController@update')->name('update_ticket');

    });
//});
