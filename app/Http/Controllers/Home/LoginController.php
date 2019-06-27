<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.index');
    }

    public function dologin(Request $request)
    {
    	$uname = $request->input('uname','');
    	$upass = $request->input('upass','');

    	$user_data = Users::where('uname','=',$uname)->first();
    	// dd($user_data); 
    	if(empty($user_data)){
    		 echo "<script>alert('用户名或者密码错误');location.href='/home/login'</script>";
             exit;
    	}

    	if(!Hash::check($upass,$user_data->upass)){
    		echo "<script>alert('用户名或者密码错误');location.href='/home/login'</script>";
            exit;
    	}

    	// 登录 存session
    	session(['home_login'=>true]);
    	session(['home_user'=>$user_data]);
        
    	// 跳转
    	echo "<script>alert('登录成功');location.href='/home/index'</script>";
    }

    // 退出登录
    public function logout()
    {
    	session(['home_login'=>false]);
    	session(['home_user'=>null]);

    	return redirect('/home/index');
    }
}
