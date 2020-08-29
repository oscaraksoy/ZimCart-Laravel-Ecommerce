<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/category/{slug}', 'FrontendController@category')->name('frontendCategory');
Route::get('/categories', 'FrontendController@categories')->name('frontendCategories');
Route::get('/sub-category/{slug}', 'FrontendController@subcategory')->name('subcategory');
Route::get('/product/{slug}', 'FrontendController@show')->name('single-product');
Route::post('/contact', 'FrontendController@contactStore')->name('store-contact');
Route::get('/contact', 'FrontendController@contact')->name('contact-us');

Route::resource('cart', 'CartController');
Route::resource('checkout', 'CheckoutController');
Route::get('empty', function () {
	Cart::destroy();
});

Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('admin/users', 'Admin\UserController');
	Route::resource('admin/slides', 'Admin\SlideController');
	Route::resource('admin/categories', 'Admin\CategoryController');
	Route::resource('admin/subcategories', 'Admin\SubCategoryController');
	Route::delete('admin/products/photo/{id}', 'Admin\ProductController@destroyImage')->name('destroyImage');
	Route::delete('admin/products/attribute/{id}', 'Admin\ProductController@destroyAttribute')->name('destroyAttribute');
	Route::resource('admin/products', 'Admin\ProductController');
	Route::resource('admin/system-settings', 'Admin\SystemSettingsController');
	Route::get('/admin/contact', 'Admin\MessageController@index')->name('contactMessages');
});
