<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/aboutus", "AboutUsController@index");

Route::group(['middleware' => 'auth'], function () {
   Route::resource('product', 'ProductController')->middleware("permission:list-product|create-product|edit-product"); 
   Route::resource('user', 'UserController')->middleware("permission:list-user|create-user|edit-user"); 
   Route::resource('role', 'RoleController')->middleware("permission:list-role|create-role|edit-role"); 
});



