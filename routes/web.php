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

//Route::get('/', function () {
//    return view('home');
//});

Route::any('/','UserController@index')->name('index');
Route::any('add-user','UserController@addUser')->name('add-user');
Route::any('delete/{criteria?}','UserController@deleteUser')->name('delete');
Route::any('edit/{criteria?}','UserController@editUser')->name('edit');
Route::any('edit-action','UserController@editUserAction')->name('edit-action');