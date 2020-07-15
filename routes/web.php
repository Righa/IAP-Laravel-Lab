<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('car', 'CarController@allcars');
Route::get('car/{id}', 'CarController@particularcar');

Route::get('newcar', 'CarController@create');
Route::post('car', 'CarController@newcar');

Route::get('car/edit', 'CarController@edit');
Route::post('car/edit/{id}', 'CarController@update');

Route::post('car/{id}', 'CarController@destroy');
