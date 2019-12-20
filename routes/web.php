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




Route::group(['prefix' => '/'], function () {
    // Index Mainpage
    Route::get('',  ["uses"=>"ProductsController@index", "as"=> "login"]);
    Route::get('aboutUs',  ["uses"=>"HomeController@aboutUs", "as"=> "aboutUs"]);
    Route::get('contactUs',["uses"=>"HomeController@contactUs", "as"=> "contactUs"]);
    Route::get('sitemap',  ["uses"=>"HomeController@sitemap", "as"=> "sitemap"]);
    Route::get('test',  ["uses"=>"ProductsController@test", "as"=> "test"]);
});

//User Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Group Admin
Route::group(['prefix' => '/admin'], function () {
    // Admin Panel
    Route::get('products', ["uses"=>"Admin\AdminProductsController@index","as"=>"adminDisplayProducts"])->middleware('restrictToAdmin');;

    //display edit product form
    Route::get('editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm", "as"=> "adminEditProductForm"]);

    //display edit product image form
    Route::get('editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm", "as"=> "adminEditProductImageForm"]);

    //Update product image from admin panel
    Route::post('updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);

    //Update product infomation from admin panel
    Route::post('updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

    //Update product infomation from admin panel
    Route::post('updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

    // Display adding new product form
    Route::get('createProductForm', ["uses"=>"Admin\AdminProductsController@createProductForm","as"=>"adminCreateProductForm"]);

    //Add new product from admin panel
    Route::post('sendCreateProductForm', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as"=> "adminSendCreateProductForm"]);

    //Delete product from admin panel
    Route::get('deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as"=> "adminDeleteProduct"]);
});