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


Route::get('/shop', 'ItemController@index')->name('shop.index');
Route::get('/shop/add', 'ItemController@formAddProduct')->name('shop.add')->middleware('autenticator');
Route::post('/shop/add', 'ItemController@storeItem')->name('shop.storeItem')->middleware('autenticator');

Route::get('/login', 'LoginController@index')->name('shop.login.index');
Route::post('/login', 'LoginController@login')->name('shop.login');

Route::get('/register', 'RegisterController@index')->name('shop.singup.index');
Route::post('/register', 'RegisterController@store')->name('shop.singup');


Route::get('/product/{item}', 'ProductController@index')->name('product.index');
Route::get('/product/{item}/cart', 'ProductController@AddItemCart')->name('cart');
Route::get('/product/{item}/cart/remove', 'ProductController@RemoveItemcart')->name('cartRemove');
Route::delete('/product/{item}', 'ProductController@delete')->name('product.delete')->middleware('autenticator');


Route::get('/stock/{item}', 'ProductController@stock')->name('stock');
Route::post('/stock/{item}', 'ProductController@stockUpdate')->name('stock.update');

Route::get('/checkout', 'ProductController@checkout')->name('product.checkout');

Route::post('/purchased','ProductController@buyItem')->name('shop.buyItem');

Route::get('/categories','CategoryController@index')->name('shop.store.categ');
Route::get('/categories/{category}/products', 'CategoryController@showProducts');
Route::post('/categories','CategoryController@store')->name('shop.store.categ');
Route::delete('/categories/{categorie}','CategoryController@delete')->middleware('autenticator');

Route::get('/unavailable','ItemController@unavailable')->name('shop.unavaible')->middleware('autenticator');

Route::get('/out', function () {
    Auth::logout();
    return redirect('/shop');
});
