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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/dashboard','AdminController@dashboard');

// Dashboard
Route::get('admin/add_category','AdminController@category');
Route::get('admin/show/{id}','AdminController@show');
Route::get('admin/add_delivery','AdminController@delivery');
Route::get('admin/add_coupon','AdminController@coupon');
Route::get('admin/add_dish','AdminController@dish');

// category
Route::get('category/create','CategoryController@create');
Route::post('category/insert','CategoryController@save');
Route::get('category/delete/{id}','CategoryController@delete');
Route::get('admin/category/edit/{id}','CategoryController@edit');
Route::post('category/update','CategoryController@update');

//Delivery

Route::get('delivery/create','DeliveryController@create');
Route::post('delivery/insert','DeliveryController@save');
Route::get('delivery/delete/{id}','DeliveryController@delete');
Route::get('admin/delivery/edit/{id}','DeliveryController@edit');
Route::post('delivery/update','DeliveryController@update');

//Coupon
Route::get('coupon/create','CouponController@create');
Route::post('coupon/insert','CouponController@save');
Route::get('coupon/delete/{id}','CouponController@delete');
Route::get('admin/coupon/edit/{id}','CouponController@edit');
Route::post('coupon/update','CouponController@update');

//Dish
Route::get('dish/create','DishController@create');
Route::post('dish/insert','DishController@save');
Route::get('dish/delete/{id}','DishController@delete');
Route::get('admin/dish/edit/{id}','DishController@edit');
Route::post('dish/update','DishController@update');