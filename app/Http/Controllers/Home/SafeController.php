<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\FriendsLinks;
use Hash;
class SafeController extends Controller
{
	public function index($id)
	{

		$friends = FriendsLinks::where('status',1)->get();
		// 加载 修改密码 页面
		return view('home.usersinfo.safe.index',['friends'=>$friends]);
		
	}
	
	// 执行修改密码操作
	public function changePass(Request $request,$id)
	{
		// 先从库中找到要修改密码的用户信息
		$data = Users::find($id);
		// 接收用户修改后的数据
		$upass = $request->input('upass','');
		$newpass = $request->input('newpass','');
		$repass = $request->input('repass','');

		// 正则验证 匹配库中的原密码 一致继续进行修改 不一致提醒原密码错误
		if(!Hash::check($upass,$data->upass)){
    		echo "<script>alert('原密码错误');location.href='/home/safe/changePass'</script>";
            exit;
    	}
    	// 给密码加正则
    	if(!preg_match("/^[\w]{6,18}$/",$newpass)){
             echo "<script>alert('新密码格式错误');location.href='/home/safe/changePass'</script>";
             exit;
        }
		// 给确认密码加正则
        if(!preg_match("/^[\w]{6,18}$/",$repass)){
             echo "<script>alert('确认密码格式错误');location.href='/home/safe/changePass'</script>";
             exit;
        }
        // 比较新密码和确认密码输入是否一致
        if($newpass != $repass){
            echo "<script>alert('两次密码输入不一致');location.href='/home/safe/changePass'</script>";
            exit;
        }
        // 将密码存库
    	$data['upass'] = Hash::make($newpass);
    	$res = $data->save();
    	if($res){
			echo "<script>alert('修改密码成功');location.href='/home/index'</script>";
		}else{
			echo "<script>alert('修改密码失败');location.href='/home/safe/changePass'</script>";
		}
	}
    
}

