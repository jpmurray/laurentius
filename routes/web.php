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

Auth::routes(["register" => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('regnums', 'RegnumController');
Route::resource('divisios', 'DivisioController');

// using route::resource resulted in weird model binding to controller.
// reverted to manually creating routes.
Route::get('/classes/', 'ClassisController@index')->name('classes.index');
Route::get('/classes/create', 'ClassisController@create')->name('classes.create');
Route::post('/classes/', 'ClassisController@store')->name('classes.store');
Route::get('/classes/{classis}', 'ClassisController@show')->name('classes.show');
Route::get('/classes/{classis}/edit', 'ClassisController@edit')->name('classes.edit');
Route::put('/classes/{classis}', 'ClassisController@update')->name('classes.update');
Route::delete('/classes/{classis}', 'ClassisController@destroy')->name('classes.destroy');
