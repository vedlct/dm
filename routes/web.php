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
    return view('welcome');
});
Route::get('/home', 'ProductController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category-add/{id?}', 'CategoryController@create')->name('category.add');
Route::post('/category-submit', 'CategoryController@store')->name('category.submit');
Route::get('/category-list', 'CategoryController@index')->name('category.list');
Route::post('/category-show', 'CategoryController@categoryTable')->name('category.table');

///Product
Route::get('/product-add/{id?}', 'ProductController@create')->name('product.add');
Route::post('/product-submit', 'ProductController@store')->name('product.submit');
Route::get('/product-list/{id?}', 'ProductController@index')->name('product.list');
Route::get('/add-to-cart/{id}', 'ProductController@addToCart');

//Cart
Route::get('/checkout', 'OrderController@index')->name('checkout');
Route::post('/order-confirm', 'OrderController@orderConfirm')->name('orderConfirm');

//order
Route::get('/orders', 'OrderController@orders')->name('orders');
Route::post('/orders', 'OrderController@allorders')->name('allOrders');
Route::post('/order-details', 'OrderController@orderDetails')->name('orderDetails');
