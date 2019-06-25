<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\UsersInfos;
use DB;
class UsersinfoController extends Controller
{
    //
    public function index($id)
     {

    	$user_data = Users::where('id',$id)->first();
    	// 显示 用户个人信息页面
    	return view('home.usersinfo.index',['user_data'=>$user_data]);
    }

    public function edit($id)
    {
    	// 修改个人信息页面
    	$user_data = Users::find($id);

    	return view('home.usersinfo.edit',['user_data'=>$user_data]);
    }

    public function update(Request $request,$id)
    {
    	 // // 开启事务  使用户表和用户详情表同时添加数据
        
          DB::beginTransaction();
        // 获取头像
        if($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = '';
        }

        $user = Users::find($id);
        $user->email = $request->input('email','');
        $user->phone = $request->input('phone','');
        $res1 = $user->save();
        
        $profile = $file_path;
        $sex = $request->input('sex','');
        $age = $request->input('age','');
        $addr = $request->input('addr','');
        $userinfo = UsersInfos::firstOrCreate(['users_id'=>$id,'profile'=>$file_path,'sex'=>$sex,'age'=>$age,'addr'=>$addr]);;
        $res2 = $userinfo->save();

        if($res1 && $res2){
            // 如果两个表都修改成功 就提交事务
            DB::commit();
            $new_user = Users::find($id);
            // dd($new_user);
            session(['home_user'=>$new_user]);
           	echo "<script>alert('修改成功');location.href='/home/index'</script>";

        }else{
            // 否则 就执行事务回滚
            DB::rollBack();
            echo "<script>alert('修改失败');location.href='/home/usersinfo/update/{{$id}}'</script>";
        }
    	
    }
}
