<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'PageController@home')->name('home');

Route::get('/creater/{section}', 'PageController@creater')
    ->name('creater');

Route::post('/creater/{section}', 'newExperimentController@creater');

Route::get('/monitor/{section}', 'PageController@monitor')
    ->name('monitor');

Route::get('/recruitment/{section}', 'PageController@recruitment')
    ->name('recruitment');

Route::get('/analyzer', 'PageController@analyzer')
    ->name('analyzer');

    Route::get('/test', function () {
        $admin = new App\Admin;
        $admin->save();
    });
