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







































































// 后台分类的路由
Route::resource('admin/cates','Admin\CatesController');
// 后台商品的路由
Route::resource('admin/goods','Admin\GoodsController');

// 后台商品详情添加
Route::get('admin/goodsinfos/create/{id}','Admin\GoodsinfosController@create');
// 商品详情执行添加
Route::post('admin/goodsinfos/store/{id}','Admin\GoodsinfosController@store');
// 商品详情的列表页
Route::get('admin/goodsinfos/index/{id}','Admin\GoodsinfosController@index');
// 商品详情的修改页面
Route::get('admin/goodsinfos/edit/{id}','Admin\GoodsinfosController@edit');
// 商品详情的执行修改
Route::post('admin/goodsinfos/update/{id}','Admin\GoodsinfosController@update');
// 商品详情的删除
Route::post('admin/goodsinfos/destroy/{id}','Admin\GoodsinfosController@destroy');
 
// 前台首页的路由
Route::resource('home/index','Home\IndexController');
Route::get('home/list/{id}','Home\ListController@index');
Route::get('home/details/{id}','Home\DetailsController@index');
Route::get('home/car','Home\CarController@index');
Route::get('home/car/store','Home\CarController@store');
Route::get('home/car/destroy/{id}','Home\CarController@destroy');

