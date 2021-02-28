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


Route::get('/','ReportController@index')->name('index')->middleware('index.basic');
Route::post('/report','ReportController@postreport')
->name('report');
Route::get('confirm','ReportController@showConfirm')->name('confirm');
Route::post('confirm','ReportController@postConfirm')->name('confirm');
Route::get('sent','ReportController@showSentMessage')->name('sent');
