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
// Route::get('admin/add','Admin\InsertController@add');
// 后台登录页面
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
Route::get('admin/logout','Admin\LoginController@logout');
// 后台 修改密码 路由
Route::get('admin/changepass/{id}','Admin\LoginController@changepass');
Route::post('admin/dopass/{id}','Admin\LoginController@dopass');
// 后台修改头像 路由
Route::get('admin/changeprofile/{id}','Admin\LoginController@changeprofile');
Route::post('admin/doprofile/{id}','Admin\LoginController@doprofile');


Route::get('admin/rbac',function(){
	return view('admin.rbac');
});
Route::group(['middleware'=>['login','nodes']],function(){
// 后台首页路由
Route::get('admin','Admin\IndexController@index');

// 后台用户管理路由
Route::resource('admin/users','Admin\UsersController');
// 后台 用户详情 路由
Route::get('admin/userinfos/index/{id}','Admin\UsersInfosController@index');

// 后台 商品品牌管理  路由
Route::resource('admin/brands','Admin\BrandsController');

// 后台 轮播图管理 路由
Route::resource('admin/banners','Admin\BannersController');
// 后台 友情链接 路由
Route::resource('admin/friendlinks','Admin\FriendsLinksController');
// 后台 标签云 路由
Route::resource('admin/tagnames','Admin\TagnamesController');
// 后台 管理员 路由
Route::resource('admin/adminusers','Admin\AdminusersController');

// 后台 角色 管理 路由
Route::resource('admin/roles','Admin\RolesController');
// 后台 权限 管理 路由
Route::resource('admin/nodes','Admin\NodesController');
});









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
Route::get('home/usersinfo/{id}','Home\UsersinfoController@index');
Route::post('home/usersinfo/edit/{id}','Home\UsersinfoController@edit');
Route::post('home/usersinfo/update/{id}','Home\UsersinfoController@update');

// 前台 账户安全路由
Route::get('home/safe/{id}','Home\SafeController@index');
Route::post('home/safe/changePass/{id}','Home\SafeController@changePass');





































































// 后台分类的路由
Route::resource('admin/cates','Admin\CatesController');
// 后台商品的路由
Route::resource('admin/goods','Admin\GoodsController');
// 后台商品详情添加
Route::get('admin/goodsinfos/create/{id}','Admin\GoodsinfosController@create');
// 后台商品详情执行添加
Route::post('admin/goodsinfos/store/{id}','Admin\GoodsinfosController@store');
// 后台商品详情的列表页
Route::get('admin/goodsinfos/index/{id}','Admin\GoodsinfosController@index');
// 后台商品详情的修改页面
Route::get('admin/goodsinfos/edit/{id}','Admin\GoodsinfosController@edit');
// 后台商品详情的执行修改
Route::post('admin/goodsinfos/update/{id}','Admin\GoodsinfosController@update');
// 后台商品详情的删除
Route::post('admin/goodsinfos/destroy/{id}','Admin\GoodsinfosController@destroy');
// 后台订单页
Route::get('admin/ordermanage/index','Admin\OrdermanageController@index');
// 后台订单详情页
Route::get('admin/ordermanage/info/{id}','Admin\OrdermanageController@info');
// 后台订单发货
Route::get('admin/ordermanage/send/{id}','Admin\OrdermanageController@send');
// 后台订单取消订单
Route::get('admin/ordermanage/cancel/{id}','Admin\OrdermanageController@cancel');
// 申请取消订单方法
Route::get('admin/ordermanage/apply/{id}','Admin\OrdermanageController@apply');
// 确认收货
Route::get('admin/ordermanage/confirm/{id}','Admin\OrdermanageController@confirm');
// 后台查看评论
Route::get('admin/speak/index','Admin\SpeakController@index');






// 前台首页的路由
Route::resource('home/index','Home\IndexController');
// 前台列表页
Route::get('home/list','Home\ListController@index');
// 前台详情页
Route::get('home/details/{id}','Home\DetailsController@index');
// 前台购物车页
Route::get('home/car/index','Home\CarController@index');
// 前台添加购物车
Route::get('home/car/add','Home\CarController@add');
// 前台购物车增加商品数量
Route::get('home/car/addnum','Home\CarController@addNum');
// 前台购物车减少商品数量
Route::get('home/car/descnum','Home\CarController@descNum');
// 前台购物车删除
Route::get('home/car/delete','Home\CarController@delete');
// 前台确认结算
Route::get('home/order/account','Home\OrderController@account');
// 前台执行添加新地址
Route::post('home/order/add','Home\OrderController@add');
// 前台订单添加新地址
Route::get('home/order/create','Home\OrderController@create');
// 前台往订单表添加数据
Route::get('home/order/index','Home\OrderController@index');
// 前台查看我的订单页
Route::get('home/order/myorder','Home\OrderController@myorder');
// 前台生成订单付款页
Route::get('home/order/myods','Home\OrderController@myods');
// 前台添加评论
Route::get('home/order/speak/{id}','Home\OrderController@speak');
// 前台执行添加评论
Route::post('home/order/dospeak/{id}','Home\OrderController@dospeak');