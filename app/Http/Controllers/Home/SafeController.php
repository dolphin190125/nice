<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
class SafeController extends Controller
{
	public function index($id)
	{

		// 显示密码 页面
		return view('home.usersinfo.safe.index');
		
	}
	
	// 修改 密码
	public function changePass(Request $request,$id)
	{
		$data = Users::find($id);

		$upass = $request->input('upass','');
		$newpass = $request->input('newpass','');
		$repass = $request->input('repass','');


		if(!Hash::check($upass,$data->upass)){
    		echo "<script>alert('原密码错误');location.href='/home/safe/changePass'</script>";
            exit;
    	}

    	if(!preg_match("/^[\w]{6,18}$/",$newpass)){
             echo "<script>alert('新密码格式错误');location.href='/home/safe/changePass'</script>";
             exit;
        }

         if(!preg_match("/^[\w]{6,18}$/",$repass)){
             echo "<script>alert('确认密码格式错误');location.href='/home/safe/changePass'</script>";
             exit;
        }

        if($newpass != $repass){
            echo "<script>alert('两次密码输入不一致');location.href='/home/safe/changePass'</script>";
            exit;
        }

    	$data['upass'] = Hash::make($newpass);
    	$res = $data->save();
    	if($res){
			echo "<script>alert('修改密码成功');location.href='/home/index'</script>";
		}else{
			echo "<script>alert('修改密码失败');location.href='/home/safe/changePass'</script>";
		}
	}
    
}

