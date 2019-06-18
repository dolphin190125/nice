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
// 后台 用户详情 路由
// Route::get('admin/userinfos/create/{id}','Admin\UsersInfosController@create');
// Route::post('admin/userinfos/store/{id}','Admin\UsersInfosController@store');
Route::get('admin/userinfos/index/{id}','Admin\UsersInfosController@index');
Route::get('admin/userinfos/edit/{id}','Admin\UsersInfosController@edit');
Route::post('admin/userinfos/update/{id}','Admin\UsersInfosController@update');

// 后台 商品品牌管理  路由
Route::resource('admin/brands','Admin\BrandsController');

// 后台 轮播图管理 路由
Route::resource('admin/banners','Admin\BannersController');




// 后台 友情链接 路由
Route::resource('admin/friendlinks','Admin\FriendsLinksController');

// 前台 注册 路由
Route::get('home/register','Home\RegisterController@index');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
// 处理 手机号注册
Route::post('home/register/store','Home\RegisterController@store');
// 处理 邮箱注册
Route::post('home/register/insert','Home\RegisterController@insert');
Route::get('home/register/changeStatus/{id}/{token}','Home\RegisterController@changeStatus');

// 前台  登录 路由
Route::get('home/login','Home\LoginController@login');
Route::post('home/login/dologin','Home\LoginController@dologin');
Route::get('home/login/logout','Home\LoginController@logout');

// 前台 个人中心 路由
Route::get('home/usersinfo','Home\UsersinfoController@index');






































































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

