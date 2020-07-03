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

Route::get('/front/category/{category}', 'Frontend\CategoriesController@show')->name('front.category');
Route::get('/front/product/{product}', 'Frontend\ProductsController@show')->name('product.show');




Route::get('/user/index', 'UsersController@index')->name('user.index');
Route::get('/front/profile/', 'UsersController@profile')->name('user.profile');


Route::resource('categories', 'CategoriesController')->middleware('adminLogin');
Route::resource('brands', 'BrandsController')->middleware('adminLogin');
Route::resource('products', 'ProductsController')->middleware('adminLogin');
Route::resource('shippings', 'ShippingsController')->middleware('adminLogin');
Route::resource('orders', 'OrdersController')->middleware('adminLogin');
Route::resource('banners', 'MenuBannersController')->middleware('adminLogin');
Route::resource('afterSlider', 'AfterSliderController')->middleware('adminLogin');
Route::resource('sliders', 'SliderController')->middleware('adminLogin');
Route::get('/product/index/{category}', 'ProductsController@showById')->name('categories.showById');


Route::get('/front/orders/{order}', 'UsersController@ordersUser')->name('user.orders');
Route::get('/front/thanks', 'FrontendController@thanks')->name('front.thankyou');


Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard')->middleware('adminLogin');
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@loged')->name('admin.loged');

Route::get('subscribers/index', 'SubscribersController@index')->name('subscribers.index');
Route::post('/', 'SubscribersController@store')->name('subscribers.store');

Route::resource('cart', 'CartController');
Route::get('/order', 'CartController@proceed')->name('cart.final');



Auth::routes();

Route::get('/', 'FrontendController@index')->name('/');
Route::get('/search', 'FrontendController@search')->name('search');

