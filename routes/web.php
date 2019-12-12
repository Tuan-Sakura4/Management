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

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('', 'DashboardController@index')->name('get.dashboard');
    Route::get('chart', 'DashboardController@chart')->name('get.chart.dashboard');
    Route::get('search', 'DashboardController@search')->name('get.search.dashboard');
    Route::get('test', 'DashboardController@test')->name('get.search.dashboard');
});

Route::group(['prefix' => 'teacher'], function () {
    Route::get('', 'TeacherController@index')->name('get.teacher');
    Route::post('', 'TeacherController@store')->name('post.teacher');
    Route::group(['middleware' => 'check.teacher'], function () {
        Route::get('edit/{id}', 'TeacherController@edit')->name('get.edit.teacher');
        Route::post('edit/{id}', 'TeacherController@update')->name('post.edit.teacher');
        Route::get('delete/{id}', 'TeacherController@destroy')->name('get.destroy.teacher');
    });
});

Route::group(['prefix' => 'lesson'], function () {
    Route::get('', 'LessonController@index')->name('get.lesson');
    Route::post('', 'LessonController@store')->name('post.lesson');
    Route::group(['middleware' => 'check.lesson'], function () {
        Route::get('edit/{id}', 'LessonController@edit')->name('get.edit.lesson');
        Route::post('edit/{id}', 'LessonController@update')->name('post.edit.lesson');
        Route::get('delete/{id}', 'LessonController@destroy')->name('get.destroy.lesson');
    });
});

Route::group(['prefix' => 'attendance'], function () {
    Route::get('', 'AttendanceController@index')->name('get.attendance');
    Route::post('', 'AttendanceController@store')->name('post.attendance');
    Route::group(['middleware' => 'check.attendance'], function () {
        Route::get('delete/{id}', 'AttendanceController@destroy')->name('get.destroy.attendance');
    });
});

