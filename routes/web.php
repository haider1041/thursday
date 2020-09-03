<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});


Route::resource('areas','AreaController');

Route::resource('brands', 'BrandController');

Route::resource('cities',  'CityController');

Route::resource('schedules',  'ScheduleController');

Route::resource('vouchers',  'VoucherController');

Route::resource('brand_locations', 'BrandLocationController');

Route::resource('collections', 'CollectionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');