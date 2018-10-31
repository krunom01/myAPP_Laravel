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

Route::get('/', 'PagesController@index');

Route::get('/about', function () {
   return view('pages.about');
});
route::get('/employees',function (){
    return view('pages.employees');
});
route::get('/contact',function (){
    return view('pages.contact');
});
route::get('/trainings',function (){
    return view('pages.trainings');
});
route::get('/categories',function (){
    return view('pages.categories');
});