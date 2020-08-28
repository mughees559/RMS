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

Route::get('/','TeachersController@index');
Route::POST('/register','TeachersController@register');
Route::get('/login','TeachersController@login');
Route::get('/signup','TeachersController@signup');
Route::POST('/validate','TeachersController@validatelogin');
Route::get('/logout', 'TeachersController@logout');
Route::get('/panelteacher', 'TeachersController@panelteacher');
Route::get('/teacherpic', 'TeachersController@teacherpic');
Route::post('/uploadteacherpic', 'TeachersController@uploadteacherpic');


Route::get('/asStudent','StudentsController@index');
Route::get('/signupStudent','StudentsController@signup');
Route::POST('/registerStudent','StudentsController@register');
Route::POST('/validateStudent','StudentsController@validatelogin');
Route::get('/panelStudent', 'StudentsController@panel');
Route::get('/synopsis_submit_page','StudentsController@synopsis_submit_page');
Route::POST('/store_synopsis','StudentsController@store_synopsis');
Route::get('/showdocx', 'StudentsController@showdocx');
Route::get('/emailsend', 'StudentsController@emailing');



Route::get('/home', 'HomeController@index')->name('home');
