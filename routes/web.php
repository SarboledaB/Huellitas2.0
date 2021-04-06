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
// Route::get('/', 'App\Http\Controllers\user\HomeController@index')->name("home.index");
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//For admin

// User Routes
Route::get('/admin/user/show/{id}', 'App\Http\Controllers\admin\UserController@show')->name("admin.user.show");
Route::get('/admin/user/list', 'App\Http\Controllers\admin\UserController@list')->name("admin.user.list");
Route::get('/admin/user/create', 'App\Http\Controllers\admin\UserController@create')->name("admin.user.create");
Route::post('/admin/user/save', 'App\Http\Controllers\admin\UserController@save')->name("admin.user.save");
Route::get('/admin/user/delete/{id}', 'App\Http\Controllers\admin\UserController@delete')->name("admin.user.delete");

//Foundation Routes
Route::get('/admin/foundations/create', 'App\Http\Controllers\admin\FoundationsController@create')->name("admin.foundations.create");
Route::get('/admin/foundations/list', 'App\Http\Controllers\admin\FoundationsController@list')->name("admin.foundations.list");
Route::post('/admin/foundations/save', 'App\Http\Controllers\admin\FoundationsController@save')->name("admin.foundations.save");
Route::get('/admin/foundations/show/{id}', 'App\Http\Controllers\admin\FoundationsController@show')->name("admin.foundations.show");
Route::get('/admin/foundations/delete/{id}', 'App\Http\Controllers\admin\FoundationsController@delete')->name("admin.foundations.delete");

//Donation Routes
Route::get('/admin/donations/list/{foundationId}', 'App\Http\Controllers\admin\DonationsController@list')->name("admin.donations.list");
Route::get('/admin/donations/show/{id}', 'App\Http\Controllers\admin\DonationsController@show')->name("admin.donations.show");

//PetItem Routes
Route::get('/admin/petItem/show/{id}', 'App\Http\Controllers\admin\PetItemController@show')->name("admin.petItem.show");
Route::get('/admin/petItem/create', 'App\Http\Controllers\admin\PetItemController@create')->name("admin.petItem.create");
Route::get('/admin/petItem/list', 'App\Http\Controllers\admin\PetItemController@list')->name("admin.petItem.list");
Route::post('/admin/petItem/save', 'App\Http\Controllers\admin\PetItemController@save')->name("admin.petItem.save");
Route::delete('/admin/petItem/delete/{id}', 'App\Http\Controllers\admin\PetItemController@delete')->name("admin.petItem.delete");

//Category Routes
Route::get('/admin/category/show/{id}', 'App\Http\Controllers\admin\CategoryController@show')->name("admin.category.show");
Route::get('/admin/category/create', 'App\Http\Controllers\admin\CategoryController@create')->name("admin.category.create");
Route::get('/admin/category/list', 'App\Http\Controllers\admin\CategoryController@list')->name("admin.category.list");
Route::post('/admin/category/save', 'App\Http\Controllers\admin\CategoryController@save')->name("admin.category.save");
Route::delete('/admin/category/delete/{id}', 'App\Http\Controllers\admin\CategoryController@delete')->name("admin.category.delete");

//For user

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name("user.register");
Route::post('/register/save', 'App\Http\Controllers\Auth\RegisterController@save')->name("user.save");

Route::get('/list', 'App\Http\Controllers\user\PetItemController@list')->name("user.petItem.list");
Route::get('/petItem/show/{id}', 'App\Http\Controllers\user\PetItemController@show')->name("user.petItem.show");
Route::get('/cart/add/{id}', 'App\Http\Controllers\user\CartController@add')->name("user.cart.add");
Route::get('/cart', 'App\Http\Controllers\user\CartController@show')->name("user.cart.show");
Route::get('/user/order/list', 'App\Http\Controllers\user\OrderController@list')->name("user.order.list");
Route::post('/petItem/search', 'App\Http\Controllers\user\SearchController@search')->name("user.search.search");


Route::get('/user/foundations/list', 'App\Http\Controllers\user\FoundationsController@list')->name("user.foundations.list");
Route::get('/user/foundations/show/{id}', 'App\Http\Controllers\user\FoundationsController@show')->name("user.foundations.show");

Route::get('/user/donations/create/{id}', 'App\Http\Controllers\user\DonationsController@create')->name("user.donations.create");
Route::post('/user/donations/save', 'App\Http\Controllers\user\DonationsController@save')->name("user.donations.save");
// implement
Route::get('/user/donations/list', 'App\Http\Controllers\user\DonationsController@list')->name("user.donations.list");
Route::get('/user/donations/show/{id}', 'App\Http\Controllers\user\DonationsController@show')->name("user.donations.show");
