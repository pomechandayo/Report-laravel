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



Route::get('/','ReportController@index')->name('index');
Route::post('/report','ReportController@postreport')
->name('report');
Route::get('confirm','reportController@showConfirm')->name('confirm');
Route::post('confirm','reportController@postConfirm')->name('confirm');
