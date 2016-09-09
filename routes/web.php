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

Route::get('/home', 'PageController@home');

Route::get('/newexperiment', 'PageController@createForm')
    ->name('newexperiment');

Route::get('/monitor/{section}', 'PageController@monitor')
    ->name('monitor');

Route::get('/recruitment/{section}', 'PageController@recruitment')
    ->name('recruitment');

Route::get('/analyzer', 'PageController@analyzer')
    ->name('analyzer');
