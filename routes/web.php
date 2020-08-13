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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/task','TaskController@index')->name('task');
Route::get('/task/edit/{id}','TaskController@edit')->name('task.edit');
Route::post('/task/update/{id}','TaskController@update')->name('task.update');
Route::get('/task/delete/{id}','TaskController@destroy')->name('task.delete');

