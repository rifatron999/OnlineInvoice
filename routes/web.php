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

//*** login ***
Route::get('/login','loginController@index')->name('login.index');
//Route::post('/login','loginController@signup');
//### login ###

//*** registration ***
Route::get('/registration','registrationController@index')->name('registration.index');
Route::post('/registration','registrationController@signup');

//### registration ###
