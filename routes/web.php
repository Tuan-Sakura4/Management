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

Route::group(['middleware' => 'locale'], function () {
    Route::get('teacher', 'TeacherController@index')->name('get.teacher');
    Route::post('teacher', 'TeacherController@store')->name('post.teacher');

    Route::group(['prefix' => 'courses'], function () {
        Route::get('/', 'CourseController@index')->name('course.index');
        Route::post('/', 'CourseController@store')->name('course.store');
        Route::group(['middleware' => 'course'], function () {
            Route::get('{id}/edit', 'CourseController@edit')->name('course.edit');
            Route::post('{id}/edit', 'CourseController@update')->name('course.update');
            Route::get('/{id}/destroy', 'CourseController@destroy')->name('course.destroy');
        });
    });

    Route::group(['prefix' => 'tests'], function () {
        Route::get('/', 'TestController@index')->name('test.index');
        Route::post('/', 'TestController@store')->name('test.store');
        Route::group(['middleware' => 'test'], function () {
            Route::get('{id}/edit', 'TestController@edit')->name('test.edit');
            Route::post('{id}/edit', 'TestController@update')->name('test.update');
            Route::get('{id}/destroy', 'TestController@destroy')->name('test.destroy');
        });
    });

    Route::group(['prefix' => 'students'], function () {
        Route::get('/', 'StudentController@index')->name('student.index');
        Route::post('/', 'StudentController@store')->name('student.store');
        Route::group(['middleware' => 'student'], function () {
            Route::get('{id}/edit', 'StudentController@edit')->name('student.edit');
            Route::post('{id}/edit', 'StudentController@update')->name('student.update');
            Route::get('/{id}/destroy', 'StudentController@destroy')->name('student.destroy');
        });

    });

    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);

        return redirect()->back();
    });
});
/*This Link will add session of language when they click to change language*/

