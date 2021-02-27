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


Route::get('/login','ReportController@showloginForm');
Route::post('/login','ReportController@login');
Route::get('/','ReportController@index')->name('index');
Route::post('/report','ReportController@postreport')
->name('report');
Route::get('confirm','reportController@showConfirm')->name('confirm');
Route::post('confirm','reportController@postConfirm')->name('confirm');
Route::get('sent','reportController@showSentMessage')->name('sent');
