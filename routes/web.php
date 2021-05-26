<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Language
Route::get('lang/{lang}', 'App\Http\Controllers\LanguageController@switchLang')->name('lang.switch');

//For admin

// User Routes
Route::get('/admin/user/show/{id}', 'App\Http\Controllers\admin\UserController@show')->name("admin.user.show");
Route::get('/admin/user/list', 'App\Http\Controllers\admin\UserController@list')->name("admin.user.list");
Route::get('/admin/user/create', 'App\Http\Controllers\admin\UserController@create')->name("admin.user.create");
Route::post('/admin/user/save', 'App\Http\Controllers\admin\UserController@save')->name("admin.user.save");
Route::get('/admin/user/delete/{id}', 'App\Http\Controllers\admin\UserController@delete')->name("admin.user.delete");

//Foundation Routes
Route::get('/admin/foundations/create', 'App\Http\Controllers\admin\FoundationController@create')->name("admin.foundations.create");
Route::get('/admin/foundations/list', 'App\Http\Controllers\admin\FoundationController@list')->name("admin.foundations.list");
Route::post('/admin/foundations/save', 'App\Http\Controllers\admin\FoundationController@save')->name("admin.foundations.save");
Route::get('/admin/foundations/show/{id}', 'App\Http\Controllers\admin\FoundationController@show')->name("admin.foundations.show");
Route::get('/admin/foundations/delete/{id}', 'App\Http\Controllers\admin\FoundationController@delete')->name("admin.foundations.delete");
Route::get('/admin/foundations/updateform/{id}', 'App\Http\Controllers\admin\FoundationController@updateForm')->name("admin.foundations.updateform");
Route::post('/admin/foundations/update', 'App\Http\Controllers\admin\FoundationController@update')->name("admin.foundations.update");

//Donation Routes
Route::get('/admin/donations/list/{foundationId}', 'App\Http\Controllers\admin\DonationController@list')->name("admin.donations.list");
Route::get('/admin/donations/show/{id}', 'App\Http\Controllers\admin\DonationController@show')->name("admin.donations.show");

//PetItem Routes
Route::get('/admin/petItem/show/{id}', 'App\Http\Controllers\admin\PetItemController@show')->name("admin.petItem.show");
Route::get('/admin/petItem/create', 'App\Http\Controllers\admin\PetItemController@create')->name("admin.petItem.create");
Route::get('/admin/petItem/list', 'App\Http\Controllers\admin\PetItemController@list')->name("admin.petItem.list");
Route::post('/admin/petItem/save', 'App\Http\Controllers\admin\PetItemController@save')->name("admin.petItem.save");
Route::delete('/admin/petItem/delete/{id}', 'App\Http\Controllers\admin\PetItemController@delete')->name("admin.petItem.delete");
Route::get('/admin/petItem/updateform/{id}', 'App\Http\Controllers\admin\PetItemController@updateForm')->name("admin.petItem.updateform");
Route::post('/admin/petItem/update', 'App\Http\Controllers\admin\PetItemController@update')->name("admin.petItem.update");

//Category Routes
Route::get('/admin/category/show/{id}', 'App\Http\Controllers\admin\CategoryController@show')->name("admin.category.show");
Route::get('/admin/category/create', 'App\Http\Controllers\admin\CategoryController@create')->name("admin.category.create");
Route::get('/admin/category/list', 'App\Http\Controllers\admin\CategoryController@list')->name("admin.category.list");
Route::post('/admin/category/save', 'App\Http\Controllers\admin\CategoryController@save')->name("admin.category.save");
Route::delete('/admin/category/delete/{id}', 'App\Http\Controllers\admin\CategoryController@delete')->name("admin.category.delete");

//For user

Route::get('/profile', 'App\Http\Controllers\user\ProfileController@show')->name("user.profile.show");

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name("user.register");
Route::post('/register/save', 'App\Http\Controllers\Auth\RegisterController@save')->name("user.save");

Route::get('/list', 'App\Http\Controllers\user\PetItemController@list')->name("user.petItem.list");
Route::get('/petItem/show/{id}', 'App\Http\Controllers\user\PetItemController@show')->name("user.petItem.show");
Route::get('/cart/add/{id}', 'App\Http\Controllers\user\CartController@add')->name("user.cart.add");
Route::get('/cart', 'App\Http\Controllers\user\CartController@show')->name("user.cart.show");
Route::get('/cart/buy', 'App\Http\Controllers\user\CartController@buy')->name("user.cart.buy");
Route::delete('/cart/delete/{id}', 'App\Http\Controllers\user\CartController@remove')->name("user.cart.delete");


Route::get('/user/order/list', 'App\Http\Controllers\user\OrderController@list')->name("user.order.list");
Route::get('/user/order/show/{id}', 'App\Http\Controllers\user\OrderController@show')->name("user.order.show");
Route::get('user/order/export/', 'App\Http\Controllers\user\OrderController@export')->name("user.order.export");
Route::post('/petItem/search', 'App\Http\Controllers\user\SearchController@search')->name("user.search.search");

Route::get('/order/save', 'App\Http\Controllers\user\OrderController@save')->name("user.order.save");


Route::get('/user/foundations/list', 'App\Http\Controllers\user\FoundationController@list')->name("user.foundations.list");
Route::get('/user/foundations/show/{id}', 'App\Http\Controllers\user\FoundationController@show')->name("user.foundations.show");

Route::get('/user/donations/create/{id}', 'App\Http\Controllers\user\DonationController@create')->name("user.donations.create");
Route::post('/user/donations/save', 'App\Http\Controllers\user\DonationController@save')->name("user.donations.save");
Route::get('/user/donations/list', 'App\Http\Controllers\user\DonationController@list')->name("user.donations.list");
Route::get('/user/donations/show/{id}', 'App\Http\Controllers\user\DonationController@show')->name("user.donations.show");

Route::get('/user/recipes/list', 'App\Http\Controllers\user\RecipesController@list')->name("user.recipes.list");
