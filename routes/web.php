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
Route::get('', ["uses"=>"ProductsController@index", "as"=> "login"]);

//User Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Group Homepage
Route::group(['prefix' => '/'], function () {
    Route::get('aboutUs',  ["uses"=>"HomeController@aboutUs", "as"=> "aboutUs"]);
    Route::get('contactUs',["uses"=>"HomeController@contactUs", "as"=> "contactUs"]);
    Route::get('sitemap',  ["uses"=>"HomeController@sitemap", "as"=> "sitemap"]);
    Route::get('test',     ["uses"=>"HomeController@test", "as"=> "test"]);
});

// Group Homepage
Route::group(['prefix' => '/product'], function () {
    // Index Mainpage
    Route::get('details/{id}',  ["uses"=>"ProductsController@productDetails", "as"=> "productDetails"]);
    // Add product to cart
    Route::get('details/{id}/addToCart', ["uses"=>"ProductsController@addProductToCart", "as"=> "addProductToCart"]);
});

//Logout Button in Homepage
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Group cart
Route::group(['prefix' => '/cart'], function () {
    // Show cart panel
    Route::get('', ["uses"=>"ProductsController@showCart", "as"=> "cartProducts"]);
    // Make payment
    Route::get('payment/{id}', ["uses"=>"ProductsController@clearCart", "as"=> "clearCart"]);
    // Delete item from cart
    Route::get('deleteItemFromCart/{id}', ["uses"=>"ProductsController@deleteItemFromCart", "as"=> "deleteItemFromCart"]);
});

// Group AdminProduct
Route::group(['prefix' => '/admin'], function () {
    // Admin Panel
    Route::get('products', ["uses"=>"Admin\AdminProductsController@index","as"=>"adminDisplayProducts"])->middleware('restrictToAdmin');

    //display edit product form
    Route::get('editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm", "as"=> "adminEditProductForm"]);

    //display edit product image form
    Route::get('editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm", "as"=> "adminEditProductImageForm"]);

    //Update product image from admin panel
    Route::post('updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);

    //Update product information from admin panel
    Route::post('updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

    //Update product information from admin panel
    Route::post('updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

    // Display adding new product form
    Route::get('createProductForm', ["uses"=>"Admin\AdminProductsController@createProductForm","as"=>"adminCreateProductForm"]);

    //Add new product from admin panel
    Route::post('sendCreateProductForm', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as"=> "adminSendCreateProductForm"]);

    //Delete product from admin panel
    Route::get('deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as"=> "adminDeleteProduct"]);

    //Display related image of product panel
    Route::get('displayRelatedImageForm/{id}', ["uses" => "Admin\AdminProductsController@displayRelatedImageForm", "as" => "adminDisplayRelatedImageForm"]);

    //Delete related image of product
    Route::get('adminDeleteRalatedProduct/{id}', ["uses" => "Admin\AdminProductsController@deleteRalatedProduct", "as" => "adminDeleteRalatedProduct"]);

    //Display update related product form
    Route::get('updateRelatedImageForm/{id}', ["uses" => "Admin\AdminProductsController@updateRelatedImageForm", "as" => "adminUpdateRelatedImageForm"]);

    //Update related product
    Route::post('adminUpdateRelatedImage/{id}', ["uses" => "Admin\AdminProductsController@updateRelatedImage", "as" => "adminUpdateRelatedImage"]);
});

// Group AdminUser
Route::group(['prefix' => '/user'], function () {
    //Display User Panel
    Route::get('displayAccount', ["uses"=>"Admin\AdminUsersController@index", "as"=> "adminDisplayAccount"]);
    //Display edit user form
    Route::get('editAccount/{id}', ["uses"=>"Admin\AdminUsersController@editAccount", "as"=> "adminEditUserForm"]);
});
