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


Route::get('teacher', 'TeacherController@index')->name('get.teacher');
Route::post('teacher', 'TeacherController@store')->name('post.teacher');
Route::group(['prefix'=>'language'],function(){
    Route::get('/','LanguageController@index')->name('language');
    Route::post('add','LanguageController@store');
    Route::get('edit/{id}', 'LanguageController@edit');
    Route::post('edit/{id}', 'LanguageController@update');
    Route::get('delete/{id}', 'LanguageController@delete');
});
Route::group(['prefix'=>'Bus'],function(){
    Route::get('/','BuController@index');
    Route::post('add','BuController@store');
    Route::get('edit/{id}', 'BuController@edit');
    Route::post('edit/{id}', 'BuController@update');
    Route::get('delete/{id}', 'BuController@delete');
});
