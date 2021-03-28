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

Auth::routes();


Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

// ADMIN
Route::get('/admin/foundations/create', 'App\Http\Controllers\admin\FoundationsController@create')->name("admin.foundations.create");
Route::get('/admin/foundations/list', 'App\Http\Controllers\admin\FoundationsController@list')->name("admin.foundations.list");
Route::post('/admin/foundations/save', 'App\Http\Controllers\admin\FoundationsController@save')->name("foundations.admin.save");
Route::get('/admin/foundations/show/{id}', 'App\Http\Controllers\admin\FoundationsController@show')->name("foundations.admin.show");
Route::get('/admin/foundations/delete/{id}', 'App\Http\Controllers\admin\FoundationsController@delete')->name("admin.foundations.delete");

Route::get('/admin/donations/list/{foundationId}', 'App\Http\Controllers\admin\DonationsController@list')->name("admin.donations.list");
Route::get('/admin/donations/show/{id}', 'App\Http\Controllers\admin\DonationsController@show')->name("admin.donations.show");



// USER
Route::get('/user/foundations/list', 'App\Http\Controllers\user\FoundationsController@list')->name("user.foundations.list");
Route::get('/user/foundations/show/{id}', 'App\Http\Controllers\user\FoundationsController@show')->name("user.foundations.show");

Route::get('/user/donations/create/{id}', 'App\Http\Controllers\user\DonationsController@create')->name("user.donations.create");
Route::post('/user/donations/save', 'App\Http\Controllers\user\DonationsController@save')->name("user.donations.save");