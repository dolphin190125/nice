<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
class LoginController extends Controller
{
    // 登录界面
    public function login()
    {
        // 加载登录页面
    	return view('home.login.index');
    }
    // 执行登录
    public function dologin(Request $request)
    {
        // 拿到输入的uname和密码
    	$uname = $request->input('uname','');
    	$upass = $request->input('upass','');
        // 用输入的用户名去表里查询,有没有这条数据
    	$user_data = Users::where('uname','=',$uname)->first();
    	// dd($user_data); 
        // 没有数据就提示用户 用户名或者密码错误
    	if(empty($user_data)){
    		 echo "<script>alert('用户名或者密码错误');location.href='/home/login'</script>";
             exit;
    	}
        // 如果根据用户名在库中查到数据,再验证密码是不是跟表里的密码一样
    	if(!Hash::check($upass,$user_data->upass)){
    		echo "<script>alert('用户名或者密码错误');location.href='/home/login'</script>";
            exit;
    	}

    	// 登录成功后 存入session
    	session(['home_login'=>true]);
    	session(['home_user'=>$user_data]);
        
    	// 跳转
    	echo "<script>alert('登录成功');location.href='/home/index'</script>";
    }

    // 退出登录
    public function logout()
    {
        // 把session清空
    	session(['home_login'=>false]);
    	session(['home_user'=>null]);

    	return redirect('/home/index');
    }
}
