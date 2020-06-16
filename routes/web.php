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

Route::get('/', 'ClientController@index');

Route::get('/cart', 'ClientController@cart');

Route::get('/category', 'ClientController@category');

Route::get('/checkout', 'ClientController@checkout');

Route::get('/contact', 'ClientController@contact');


//Admin
Route::get('/admin', 'AdminController@index');

//Category
Route::get('view_category_index', 'CategoryController@view_index');

Route::get('view_category_create', 'CategoryController@view_create');

Route::post('create_category', 'CategoryController@create');

//Product
Route::get('view_product_index', 'ProductController@view_index');

Route::get('view_product_create', 'ProductController@view_create');

Route::post('create_product', 'ProductController@create');

Route::get('/unactivate_product/{id}', 'ProductController@unactivate_product');

Route::get('/activate_product/{id}', 'ProductController@activate_product');

Route::get('/delete_product/{id}', 'ProductController@delete_product');

//Banner
Route::get('view_banner_index', 'BannerController@view_index');

Route::get('view_banner_create', 'BannerController@view_create');

Route::post('create_banner', 'BannerController@create');

Route::get('/unactivate_banner/{id}', 'BannerController@unactivate_banner');

Route::get('/activate_banner/{id}', 'BannerController@activate_banner');

Route::get('/delete_banner/{id}', 'BannerController@delete_banner');