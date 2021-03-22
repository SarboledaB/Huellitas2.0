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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

//User
Route::get('/list', 'App\Http\Controllers\user\PetItemController@list')->name("user.petItem.list");
Route::get('/petItem/show/{id}', 'App\Http\Controllers\user\PetItemController@show')->name("user.petItem.show");
Route::get('/cart/add/{id}', 'App\Http\Controllers\user\CartController@add')->name("user.cart.add");
Route::get('/cart', 'App\Http\Controllers\user\CartController@show')->name("user.cart.show");

