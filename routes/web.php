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

// 后台首页路由
Route::get('admin','Admin\IndexController@index');

// 后台用户管理路由
Route::resource('admin/users','Admin\UsersController');

// 后台 商品品牌管理  路由
Route::resource('admin/brands','Admin\BrandsController');

// 后台 轮播图管理 路由
Route::resource('admin/banners','Admin\BannersController');

Route::get('admin/banners/changeStatus','Admin\BannersController@changeStatus');






































































//后台分类的路由
Route::resource('admin/cates','Admin\CatesController');
Route::resource('home/index','Home\IndexController');

