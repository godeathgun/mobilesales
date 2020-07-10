<?php

use Illuminate\Support\Facades\Route;

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

//Client
Route::get('/', 'ClientController@index');

Route::get('/cart', 'ClientController@cart');

Route::get('/category', 'ClientController@category');

Route::get('/checkout', 'ClientController@checkout');

Route::get('/contact', 'ClientController@contact');

Route::get('/productDetail', 'ClientController@productdetail');

//Logout
Route::get('/logout', 'ClientController@getLogout');
//Register
Route::get('/register', 'ClientController@getRegister');
Route::post('/register', 'ClientController@postRegister');
//Login
Route::get('/login','ClientController@getLogin');
Route::post('/login','ClientController@postLogin');
//verify
Route::get('/send-mail', 'ClientController@verifyAccount')->name('user.verify.account');

//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/products', 'ProductController@view_index');
Route::get('/productdetails', 'ProductController@view_index');
Route::get('/users', 'UserController@view_index');
Route::get('/banners', 'BannerController@view_index');
Route::get('/employees', 'EmployeeController@view_index');
Route::get('/orders', 'OrderController@view_index');
Route::get('/manufaturers', 'ManufacturerController@view_index');
Route::get('/categories', 'CategoryController@view_index');



//Category
Route::get('category_create', 'CategoryController@view_create');

Route::post('create_category', 'CategoryController@create');

Route::get('/unactivate_category/{id}', 'CategoryController@unactivate_category');

Route::get('/activate_category/{id}', 'CategoryController@activate_category');

Route::get('/delete_category/{id}', 'CategoryController@delete_category');

Route::get('/category_edit/{id}', 'CategoryController@view_edit');

Route::post('category_edit/category_edit', 'CategoryController@edit_category'); 

//Product
Route::get('product_create', 'ProductController@view_create');

Route::post('create_product', 'ProductController@create');

Route::get('/unactivate_product/{id}', 'ProductController@unactivate_product');

Route::get('/activate_product/{id}', 'ProductController@activate_product');

Route::get('/delete_product/{id}', 'ProductController@delete_product');

Route::get('/product_edit/{id}', 'ProductController@view_edit');

Route::post('product_edit/edit_product', 'ProductController@edit_product'); 


//Banner    
Route::get('banner_create', 'BannerController@view_create');

Route::post('create_banner', 'BannerController@create');

Route::get('/unactivate_banner/{id}', 'BannerController@unactivate_banner');

Route::get('/activate_banner/{id}', 'BannerController@activate_banner');

Route::get('/delete_banner/{id}', 'BannerController@delete_banner');

Route::get('/banner_edit/{id}', 'BannerController@view_edit');

Route::post('banner_edit/edit_banner', 'BannerController@edit_banner'); 

// Đăng nhập và xử lý đăng nhập
Route::get('login', [ 'as' => 'login', 'uses' => 'ClientController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'ClientController@postLogin']);

//serch
Route::get('search', ['as'=>'search','uses'=>'ClientController@getSearch']);

 