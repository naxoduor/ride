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

Route::get('/search', 'TripsController@search');
Route::post('/searchform', 'TripsController@searchform');
Route::post('/searchitem/{id}', 'TripsController@searchitem');




