<?php

/* start frontend */
Route::get('/', 'WelcomeController@index');
Route::get('/home', 'WelcomeController@index');
Route::get('/contact-us', 'WelcomeController@contact');
Route::get('/category-view/{id}', 'WelcomeController@category');
Route::get('/brand-view/{id}', 'WelcomeController@brand');
Route::get('/product-details/{id}', 'WelcomeController@productDetails');
Route::get('/products', 'WelcomeController@products');
Route::get('/add-to-cart/{id}', 'CartController@addToCart');
Route::get('/add-to-wishlist/{id}', 'WishlistController@addToWishlist');
Route::get('/show-wishlist', 'WishlistController@showWishlist');
Route::get('/delete-wishlist/{id}', 'WishlistController@deleteWishlist');
Route::get('/show-cart', 'CartController@showCart');
Route::get('/clear-cart', 'CartController@clearCart');
Route::get('/clear-wishlist', 'WishlistController@clearWishlist');
Route::get('/update-cart/{id}', 'CartController@updateCart');
Route::get('/delete-cart/{id}', 'CartController@deleteCartProduct');
Route::post('/switchToWishlist/{id}', 'CartController@switchToWishlist');
Route::post('/switchToCart/{id}', 'WishlistController@switchToCart');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/checkout/sign-up', 'CheckoutController@customerRegistration');
Route::get('/shipping-info', 'CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping', 'CheckoutController@saveShippingInfo');
Route::get('/checkout-payment', 'CheckoutController@showPaymentForm');
Route::post('/checkout/save-order', 'CheckoutController@saveOrderInfo');
Route::get('/cancelCheckout', 'CheckoutController@cancelOrderInfo');
Route::get('/checkout/my-home', 'CheckoutController@customerHome');
Route::post('/Customer-auth', 'CheckoutController@CustomerLogin');
Route::get('/customer-logout', 'CheckoutController@logout');
Route::get('/customer-profile', 'CheckoutController@customerProfile');
Route::post('/update-profile', 'CheckoutController@updateProfile');
Route::get('/search','WelcomeController@search');

/* end frontend */

/*start backend */

Route::get('/admin', 'AdminController@index');
Route::post('/admin-login-check', 'AdminController@admin_login_check');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/admin-profile', 'SuperAdminController@profile');
Route::post('/modify-profile', 'SuperAdminController@modifyProfile');

/* Category Info */
Route::get('/add-category', 'CategoryController@add_category');
Route::post('/save-category', 'CategoryController@add_category_info');
Route::get('/manage-category', 'CategoryController@manage_category');
Route::get('/unpublished-category/{id}', 'CategoryController@unpublished_category');
Route::get('/published-category/{id}', 'CategoryController@published_category');
Route::get('/edit-category/{id}', 'CategoryController@edit_category');
Route::post('/update-category', 'CategoryController@update_category');
Route::get('/delete-category/{id}', 'CategoryController@delete_category');
 /*end Category Info */

/* Manufacturer Info */
Route::get('/add-manufacturer', 'ManufacturerController@createManufacturer');
Route::post('/save-manufacturer', 'ManufacturerController@saveManufacturerInfo');
Route::get('/manage-manufacturer', 'ManufacturerController@manageManufacturer');
Route::get('/unpublished-manufacturer/{id}', 'ManufacturerController@unpublishedManufacturer');
Route::get('/published-manufacturer/{id}', 'ManufacturerController@publishedManufacturer');
Route::get('/edit-manufacturer/{id}', 'ManufacturerController@editManufacturer');
Route::post('/update-manufacturer', 'ManufacturerController@updateManufacturer');
Route::get('/delete-manufacturer/{id}', 'ManufacturerController@deleteManufacturer');
 /*end Manufacturer Info */

/*Product info*/
Route::get('/add-product','ProductController@createProduct');
Route::post('/save-product','ProductController@saveProductInfo');
Route::get('/manage-product', 'ProductController@manageProductInfo');
Route::get('/product/edit/{id}', 'ProductController@editProduct');
Route::get('/unpublished-product/{id}', 'ProductController@unpublishedProduct');
Route::get('/published-product/{id}', 'ProductController@publishedProduct');
Route::post('/product/update', 'ProductController@updateProductInfo');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
 /*end Product Info */

/*orders */
Route::get('/orders', 'OrderController@manageOrders');
Route::get('/view-invoice/{id}', 'OrderController@orderView');
Route::get('/make-order-pending/{id}', 'OrderController@orderPending');
Route::get('/make-order-placed/{id}', 'OrderController@orderPlaced');


Route::get('/logout', 'SuperAdminController@logout');

 /* end backend */
