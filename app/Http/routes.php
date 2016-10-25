<?php

header("Access-Control-Allow-Origin: *");

Route::auth();

Route::group(['middleware' => ['auth', 'web']], function () {

    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'users'], function () {

        Route::get('students', 'VisitorController@students');

        Route::get('faculties', 'VisitorController@faculties');

    });

    Route::get('colleges', 'CollegeController@index');

    Route::get('courses', 'CourseController@index');

    Route::get('resource-listings', 'ResourceController@index');

    Route::get('resource-listings/{resource}', 'ResourceController@show');

    Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => 'api'], function () {

        Route::get('colleges', 'CollegeController@index');

        Route::get('resources', 'ResourceController@index');

        // Route::get('courses', 'CourseController@index');

        Route::post('resources', 'ResourceController@store');

        Route::delete('resources/{resource}', 'ResourceController@delete');

        Route::put('resources/{resource}', 'ResourceController@update');

        Route::get('resources/{resource}/export', 'ResourceController@export');

        Route::post('courses', 'CourseController@store');

        Route::post('colleges', 'CollegeController@store');

        Route::delete('colleges/{college}', 'CollegeController@delete');

        Route::delete('courses/{course}', 'CourseController@delete');

        Route::get('members', 'VisitorController@index');

        Route::delete('members/{visitor}', 'VisitorController@delete');

    });

});

Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => 'cors'], function () {

    Route::auth();

});

Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => 'cors'], function () {

    Route::get('auth', function () {

        return response()->json(\Auth::guard('api')->user());
    });

    Route::put('users', 'UserController@update');

    Route::get('courses', 'CourseController@index');

    Route::get('colleges', 'CollegeController@index');

    Route::get('resources', 'ResourceController@index');

    Route::get('resources/{resource}', 'ResourceController@show');

    Route::post('resources/{resource}/visit', 'ResourceController@visit');

    Route::post('visitors/{visitor}/update', 'VisitorController@update');

});
