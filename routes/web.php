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

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/categories', 'PageController@categories');
Route::get('/contact', 'PageController@contact');
Route::get('/trainings', 'PageController@trainings');
Route::get('/login', 'PageController@login');
Route::resource('employee','employeeController');
Route::resource('coach','coachController');
