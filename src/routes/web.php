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
    //return view('welcome');
    return  redirect("/login");
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Admin\IndexController@index')->name('home');

//Admin
Route::get('/admin', 'Admin\IndexController@index')->name('admin_index');

//Admin
Route::get('/admin/user', 'Admin\UserController@index')->name('user_index');
Route::post('/admin/user', 'Admin\UserController@index')->name('user_index');//用户list
Route::get('/admin/addUser', 'Admin\UserController@addUser')->name('user_addUser');//跳转用户添加或者编辑页面
Route::post('/admin/savaUser', 'Admin\UserController@savaUser')->name('user_savaUser');//保存用户
