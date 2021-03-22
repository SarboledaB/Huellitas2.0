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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/index', 'App\Http\Controllers\HomeController@index')->name("home.index");

//Admin
Route::get('/admin/user/show/{id}', 'App\Http\Controllers\admin\UserController@show')->name("admin.user.show");
Route::get('/admin/user/list', 'App\Http\Controllers\admin\UserController@list')->name("admin.user.list");
Route::get('/admin/user/create', 'App\Http\Controllers\admin\UserController@create')->name("admin.user.create");
Route::post('/admin/user/save', 'App\Http\Controllers\admin\UserController@save')->name("admin.user.save");
Route::get('/admin/user/delete/{id}', 'App\Http\Controllers\admin\UserController@delete')->name("admin.user.delete");

//User
Route::get('user/order/list', 'App\Http\Controllers\user\OrderController@list')->name("user.order.list");
