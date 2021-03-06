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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'DiaryController@index')->name('diary.index');

Route::group(['middleware'=>'auth'],function(){

Route::get('diary/create', 'DiaryController@create')->name('diary.create');
Route::post('diary/create', 'DiaryController@store')->name('diary.create');

Route::delete('diary/{id}/delete', 'DiaryController@destroy')->name('diary.destroy');


Route::get('diary/{id}/edit', 'DiaryController@edit')->name('diary.edit'); // 編集画面
Route::put('diary/{id}/update', 'DiaryController@update')->name('diary.update'); //更新処理

});

