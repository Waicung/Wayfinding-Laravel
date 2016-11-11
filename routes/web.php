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
})->name('index');

Auth::routes();

Route::get('/home', 'PageController@home')
    ->name('home');

Route::get('/profile', 'ProfileController@view')
    ->name('profile');

Route::get('/experiment', 'ExperimentController@showExperimentForm')
    ->name('creater');

Route::get('/editor', 'EditorController@editor')
    ->name('editor');

Route::get('/monitor', 'PageController@monitor')
    ->name('monitor');

Route::get('/recruitment', 'PageController@recruitment')
    ->name('recruitment');

Route::get('/analyser', 'PageController@analyser')
    ->name('analyser');
