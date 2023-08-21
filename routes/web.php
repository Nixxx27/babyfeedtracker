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


Route::get('/', 'BabyLogsController@create')->name('babylogs.create');
Route::POST('/', 'BabyLogsController@store')->name('babylogs.store');
Route::DELETE('/destroy/{logId}', 'BabyLogsController@destroy')->name('babylogs.destroy');
