<?php

require 'admin.php';

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Pche
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Site\HomeController@index')->name("home");
Route::get('/category/', 'Site\CategoryController@index')->name('category.index');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/search', 'Site\ProductController@search')->name('product.search');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');

Route::post('/category/sort', 'Site\CategoryController@sort')->name('category.sort');
Route::post('/category/showAttribute', 'Site\CategoryController@showAttribute')->name('category.showAttribute');

Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::post('/product/update/cart', 'Site\ProductController@updateCart')->name('product.update.cart');

Route::get('/lang/{lang}', 'Site\LangController@setLang')->name('lang');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');
Route::get('/contact', 'Site\ContactController@index')->name('contact');
Route::post('/contact', 'Site\ContactController@sendMessage')->name('contact.send');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
    Route::get('/favorite', 'Site\FavoriteProductController@index')->name('favorite.index');
    Route::get('/favorite/{id}', 'Site\FavoriteProductController@add')->name('favorite.add');
});


