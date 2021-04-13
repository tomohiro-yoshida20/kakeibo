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

Auth::routes();
// Route::get('/home', 'KakeiboController@home')->name('home');
Route::get('/', 'KakeiboController@index')->name('index');
Route::post('/', 'KakeiboController@index')->name('index');

// 同期処理でそのまま store
Route::post('/income', 'KakeiboController@store')->name('kakeibo.add');
Route::post('/spending', 'KakeiboController@sp_store')->name('kakeibo.sp_add');

// 非同期処理で delete
Route::delete('/income/{income}', 'KakeiboController@destroy')->name('kakeibo.destroy');
Route::delete('/spending/{spending}', 'KakeiboController@sp_destroy')->name('kakeibo.sp_destroy');