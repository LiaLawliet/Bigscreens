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

Route::get('/', 'FrontController@index');
Route::resource('answer', 'AnswerController');
Route::get('/{id}', 'AnswerController@show')->where('id', '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}');
Route::get('administration', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('administration', 'Auth\LoginController@login');
Route::resource('administration/accueil', 'BackController')->middleware('auth');


//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
