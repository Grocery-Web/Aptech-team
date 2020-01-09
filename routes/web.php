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

//Logout Button in Homepage
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//User Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Change Password
Route::get('/passwordChange', 'Auth\ChangePasswordController@index')->name('passwordChange');
Route::post('/passwordUpdate', 'Auth\ChangePasswordController@passwordUpdate')->name('passwordUpdate');

// Wishlist
Route::group(['prefix' => '/wishlist'], function () {
    // Add favourite item to wishlist
    Route::get('addWishlist/{user_id}/{product_id}', ["uses"=>"Client\WishlistController@addWishlist", "as"=> "clientAddWishlist"]);
    // Display wishlist by ID
    Route::get('/{id}', ["uses"=>"Client\WishlistController@displayWishlist", "as"=> "clientDisplayWishlist"]);
    // remove Item from Wishlist
    Route::get('removeItem/{user_id}/{product_id}', ["uses"=>"Client\WishlistController@removeItem", "as"=> "clientRemoveItem"]);
    // remove Item from Product Detail
    Route::get('removeItemWishlist/{product_id}', ["uses"=>"Client\WishlistController@removeItemWishlist", "as"=> "clientRemoveItemWishlist"]);
});


// Group Indexpage
Route::group(['prefix' => '/index'], function () {
    Route::get('aboutUs',  ["uses"=>"IndexController@aboutUs", "as"=> "aboutUs"]);
    Route::get('contactUs',["uses"=>"IndexController@contactUs", "as"=> "contactUs"]);
    Route::get('sitemap',  ["uses"=>"IndexController@sitemap", "as"=> "sitemap"]);
    Route::get('search',   ["uses"=>"IndexController@search", "as"=> "getSearch"]);
});

// Group Product
Route::group(['prefix' => '/product'], function () {
    // Index Mainpage
    Route::get('details/{id}',  ["uses"=>"ProductsController@productDetails", "as"=> "productDetails"]);
    // Add product to cart
    Route::post('details/{id}/addToCart', ["uses"=>"ProductsController@addProductToCart", "as"=> "addProductToCart"]);
    // Download pdf file
    Route::get('details/{id}/createPdf', ["uses"=>"ProductsController@createPdf", "as"=> "createPdf"]);
    // Add new comment or feedback 
    Route::post('details/{id}/addReview/{user_id}', ["uses"=>"ProductsController@addReview", "as"=> "addReview"]);
    // Add new reply
    Route::post('details/{id}/addReply/{user_id}/{parent_id}', ["uses"=>"ProductsController@addReply", "as"=> "addReply"]);
    // Category sort by ID
    Route::get('sortCategory/{id}', ["uses"=>"ProductsController@sortCategory", "as"=> "sortCategory "]);
});

// Group Cart
Route::group(['prefix' => '/cart'], function () {
    // Show cart panel
    Route::get('', ["uses"=>"ProductsController@showCart", "as"=> "cartProducts"]);
    // Make payment
    Route::post('payment/{id}', ["uses"=>"ProductsController@clearCart", "as"=> "clearCart"]);
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

    // Display form adding new product
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

    //Display form adding related product form
    Route::get('adminAddRelatedImageForm/{id}', ["uses" => "Admin\AdminProductsController@addRelatedImageForm", "as" => "adminAddRelatedImageForm"]);

    //Add related product
    Route::post('adminAddRelatedImage/{id}', ["uses" => "Admin\AdminProductsController@addRelatedImage", "as" => "adminAddRelatedImage"]);
});

// Group AdminUser
Route::group(['prefix' => '/user'], function () {
    //Display User Panel
    Route::get('displayAccount', ["uses"=>"Admin\AdminUsersController@index", "as"=> "adminDisplayAccount"]);
    //Display edit user form
    Route::get('editAccount/{id}', ["uses"=>"Admin\AdminUsersController@editAccount", "as"=> "adminEditUserForm"]);
    //Submit User Update
    Route::post('updateUserChange/{id}', ["uses"=>"Admin\AdminUsersController@updateUserChange", "as"=> "adminUpdateUserChange"]);
    //Delete User
    Route::get('deleteUser/{id}', ["uses"=>"Admin\AdminUsersController@deleteUser", "as"=> "adminDeleteUser"]);
    //Display Adding New User Form
    Route::get('addAccountForm', ["uses"=>"Admin\AdminUsersController@addAccountForm", "as"=> "adminAddAccountForm"]);
    //Add New User
    Route::post('addNewAccount', ["uses"=>"Admin\AdminUsersController@addNewAccount", "as"=> "adminAddNewAccount"]);
    //Display Avatar Update Form
    Route::get('avatarUpdateForm', ["uses"=>"Admin\AdminUsersController@avatarUpdateForm", "as"=> "adminAvatarUpdateForm"]);
    //Avatar Update
    Route::post('updateAvatar/{id}', ["uses"=>"Admin\AdminUsersController@updateAvatar", "as"=> "adminUpdateAvatar"]);
});


// Group AdminCategory
Route::group(['prefix' => '/caterory'], function () {
    //Display Category Panel
    Route::get('displayCategories', ["uses"=>"Admin\AdminCategoriesController@index", "as"=> "adminDisplayCategories"]);
    //Display form adding new Category
    Route::get('createCategoryForm', ["uses"=>"Admin\AdminCategoriesController@createCategoryForm", "as"=> "adminCreateCategoryForm"]);
    //Add New Category
    Route::post('addNewCategory', ["uses"=>"Admin\AdminCategoriesController@addNewCategory", "as"=> "adminAddNewCategory"]);
    //Display form updating Category
    Route::get('editCateForm/{id}', ["uses"=>"Admin\AdminCategoriesController@editCateForm", "as"=> "adminEditCateForm"]);
    //Category Update
    Route::post('updateCategory/{id}', ["uses"=>"Admin\AdminCategoriesController@updateCategory", "as"=> "adminUpdateCategory"]);
    //Delete Category
    Route::get('deleteCate/{id}', ["uses"=>"Admin\AdminCategoriesController@deleteCate", "as"=> "adminDeleteCate"]);
});

// Group AdminInvoice
Route::group(['prefix' => '/invoice'], function () {
    //Display Invoice Panel
    Route::get('displayInvoices', ["uses"=>"Admin\AdminInvoicesController@index", "as"=> "adminDisplayInvoices"]);
    //Display Invoice Detail
    Route::get('displayInvoiceDetails/{id}', ["uses"=>"Admin\AdminInvoicesController@displayInvoiceDetails", "as"=> "adminDisplayInvoiceDetails"]);
    //Display edit invoice form
    Route::get('editInvoiceForm/{id}', ["uses"=>"Admin\AdminInvoicesController@editInvoiceForm", "as"=> "editInvoiceForm"]);
    //Update invoice information from admin panel
    Route::post('updateInvoice/{id}', ["uses"=>"Admin\AdminInvoicesController@updateInvoice", "as"=> "adminUpdateInvoice"]);
    //Remove invoice from admin panel
    Route::get('removeInvoice/{id}', ["uses"=>"Admin\AdminInvoicesController@removeInvoice", "as"=> "adminRemoveInvoice"]);
});

// Group review
Route::group(['prefix' => '/review'], function () {
    // Delete review
    Route::get('deleteReview/{id}', ["uses"=>"ReviewsController@deleteReview", "as"=> "deleteReview"]);
});


// Group Client's order management
Route::group(['prefix' => '/order'], function () {
    // Check order list
    Route::get('{id}', ["uses"=>"Client\ClientOrdersController@showOrderList", "as"=> "showOrderList"]);
    // Check order detail
    Route::get('{id}/orderDetail/{order_id}', ["uses"=>"Client\ClientOrdersController@checkOrder", "as"=> "checkOrder"]);
    // Cancel order
    Route::get('{id}/orderDetail/{order_id}/cancelOrder', ["uses"=>"Client\ClientOrdersController@cancelOrder", "as"=> "cancelOrder"]);
});