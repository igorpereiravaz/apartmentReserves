<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'App\Http\Controllers\ApartmentController@index')->name('apIndex');
Route::get('/ap/create', 'App\Http\Controllers\ApartmentController@create')->name('apCreate');
Route::post('/ap/store', 'App\Http\Controllers\ApartmentController@store')->name('apStore');
Route::get('/ap/edit/{id}', 'App\Http\Controllers\ApartmentController@edit')->name('apEdit');
Route::post('/ap/update', 'App\Http\Controllers\ApartmentController@update')->name('apUpdate');
Route::get('/ap/destroy/{id}', 'App\Http\Controllers\ApartmentController@destroy')->name('apDestroy');

Route::get('/reserve', 'App\Http\Controllers\ReserveController@index')->name('reserveIndex');
Route::get('/reserve/create/{id}', 'App\Http\Controllers\ReserveController@create')->name('reserveCreate');
Route::post('/reserve/store', 'App\Http\Controllers\ReserveController@store')->name('reserveStore');
Route::get('/reserve/edit/{id}', 'App\Http\Controllers\ReserveController@edit')->name('reserveEdit');
Route::post('/reserve/update', 'App\Http\Controllers\ReserveController@update')->name('reserveUpdate');
Route::get('/reserve/destroy/{id}', 'App\Http\Controllers\ReserveController@destroy')->name('reserveDestroy');
