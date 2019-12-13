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
    return view('mainpage');
});

/* This route is for product page development. */
Route::get('/test', function () {
    return view('product');
});

/* This route is for About Us page */
Route::get('/aboutus', function () {
    return view('aboutus');
});

/* This route is for Contact Us page */
Route::get('/contact', function () {
    return view('contactus');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
