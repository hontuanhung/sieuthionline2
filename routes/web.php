<?php
//-----------------------FRONTEND------------------------------------ 
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('trangchu','App\Http\Controllers\HomeController@index');
Route::get('register-now-sale','App\Http\Controllers\HomeController@gioithieu');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');

//Login customer
Route::get('login-customer','App\Http\Controllers\CheckoutController@LoginCustomer');
Route::post('login-cus','App\Http\Controllers\CheckoutController@Login_Customer');

//Register customer
Route::get('register-customer','App\Http\Controllers\CheckoutController@RegisterCustomer');
Route::post('sigin-customer','App\Http\Controllers\CheckoutController@SiginCustomer');
//Logout Customer
Route::get('logout-customer','App\Http\Controllers\CheckoutController@logout_customer');

//Product
Route::get('allproduct','App\Http\Controllers\ProductController@allproduct');
Route::get('chi-tiet-san-pham&{product_slug}&{shop_id}','App\Http\Controllers\ProductController@chitietsanpham');


//Cart
Route::get('cart','App\Http\Controllers\CartController@cart');

//Shop
Route::get('/register-shop','App\Http\Controllers\ShopController@register_shop');
Route::get('/login-shop','App\Http\Controllers\ShopController@login_shop');
Route::get('/logout-shop','App\Http\Controllers\ShopController@logout_shop');
Route::get('/add-product','App\Http\Controllers\ShopController@add_product');
Route::get('/profile-shop&{shop_id}','App\Http\Controllers\ShopController@profile_shop');
Route::post('/save-shop','App\Http\Controllers\ShopController@save_shop');
Route::post('/post-product','App\Http\Controllers\ShopController@post_product');
Route::post('/login-sh','App\Http\Controllers\ShopController@loginshop');
Route::get('chi-tiet-shop&{shop_id}','App\Http\Controllers\ShopController@chitietshop');
//----------------------BACK END-----------------------------------------
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//Shop
Route::get('add-shop-admin','App\Http\Controllers\ShopController@add_shop_admin');
Route::get('all-shop-admin','App\Http\Controllers\ShopController@all_shop_admin');
Route::get('edit-shop-admin&{shop_id}','App\Http\Controllers\ShopController@edit_shop_admin');
Route::get('delete-shop-admin/{shop_id}','App\Http\Controllers\ShopController@delete_shop_admin');
Route::post('save-shop-admin','App\Http\Controllers\ShopController@save_shop_admin');
Route::post('update-shop-admin/{shop_id}','App\Http\Controllers\ShopController@update_shop_admin');

//Customer   
Route::get('add-customer-admin','App\Http\Controllers\CustomerController@add_customer');
Route::get('all-customer-admin','App\Http\Controllers\CustomerController@all_customer');
Route::get('edit-customer-admin&{customer_id}','App\Http\Controllers\CustomerController@edit_customer');
Route::get('delete-customer-admin/{customer_id}','App\Http\Controllers\CustomerController@delete_customer');
Route::post('save-customer-admin','App\Http\Controllers\CustomerController@save_customer');
Route::post('update-customer-admin/{customer_id}','App\Http\Controllers\CustomerController@update_customer');

//Product
Route::get('/all-product-admin','App\Http\Controllers\ProductController@all_product_admin');
Route::get('/add-product-admin','App\Http\Controllers\ProductController@add_product_admin');
Route::get('/edit-product-admin&{product_id}','App\Http\Controllers\ProductController@edit_product_admin');
Route::get('/delete-product-admin/{product_id}','App\Http\Controllers\ProductController@delete_product_admin');
Route::post('save-product-admin','App\Http\Controllers\ProductController@save_product_admin');
Route::post('/update-product-admin/{product_id}','App\Http\Controllers\ProductController@update_product_admin');

//Category Product
Route::get('/add-category-product-admin','App\Http\Controllers\CategoryProductController@add_category_product');
Route::get('/all-category-product-admin','App\Http\Controllers\CategoryProductController@all_category_product');
Route::get('/edit-category-product-admin&{category_id}','App\Http\Controllers\CategoryProductController@edit_category_product');
Route::get('/delete-category-product-admin/{category_id}','App\Http\Controllers\CategoryProductController@delete_category_product');
Route::post('/save-category-product-admin','App\Http\Controllers\CategoryProductController@save_category_product');
Route::post('/update-category-product-admin/{category_id}','App\Http\Controllers\CategoryProductController@update_category_product');

//Authentication roles
Route::get('/register-admin','App\Http\Controllers\AuthController@register_auth');
Route::post('/register','App\Http\Controllers\AuthController@register');
Route::get('/login-admin','App\Http\Controllers\AuthController@login_admin');
Route::post('/login','App\Http\Controllers\AuthController@login');
Route::get('/logout-admin','App\Http\Controllers\AuthController@logout_admin');
