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

// Index Mainpage
Route::get('/',  ["uses"=>"ProductsController@index", "as"=> "login"]);

// This route is for product page development.
Route::get('/test', function () {
    return view('product');
});

// This route is for About Us page
Route::get('/aboutus', function () {
    return view('aboutus');
});

// This route is for Contact Us page
Route::get('/contact', function () {
    return view('contactus');
});

// Sitemap Route
Route::get('/sitemap', function () {
    return view('sitemap');
});


//User Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin Panel
Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index","as"=>"adminDisplayProducts"])->middleware('restrictToAdmin');;

//display edit product form
Route::get('admin/editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm", "as"=> "adminEditProductForm"]);

//display edit product image form
Route::get('admin/editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm", "as"=> "adminEditProductImageForm"]);

//Update product image from admin panel
Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);

//Update product infomation from admin panel
Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

//Update product infomation from admin panel
Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

// Display adding new product form
Route::get('admin/createProductForm', ["uses"=>"Admin\AdminProductsController@createProductForm","as"=>"adminCreateProductForm"]);

//Add new product from admin panel
Route::post('admin/sendCreateProductForm', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as"=> "adminSendCreateProductForm"]);

//Delete product from admin panel
Route::get('admin/deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as"=> "adminDeleteProduct"]);
