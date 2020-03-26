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

Route::get('/home', 'ConcertController@all')->name('home');
Route::get('concert', 'ConcertController@top');
Route::get('concert/create', 'ConcertController@create')->middleware('auth');
Route::post('concert/create', 'ConcertController@store')->middleware('auth');
Route::get('concert/all', 'ConcertController@all')->middleware('auth');

Route::get('concert/detail', 'ConcertController@detail')->middleware('auth');

Route::get('concert/edit', 'ConcertController@edit')->middleware('auth');
Route::post('concert/all', 'ConcertController@update')->middleware('auth');
Route::get('concert/delete', 'ConcertController@delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
