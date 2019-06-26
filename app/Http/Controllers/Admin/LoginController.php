<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use Hash;
class LoginController extends Controller
{
    // 显示登录页面
    public function login()
    {
    	return view('admin.login.login');
    }

    // 执行登录操作
    public function dologin(Request $request)
    {
    	// dump($request->all());
    	$uname = $request->input('uname','');
    	$upass = $request->input('upass','');

    	$admin_user_data = DB::table('admin_users')->where('uname',$uname)->first();
    	if(!$admin_user_data){
    		echo "<script>alert('用户名或密码错误');location.href='/admin/login'</script>";
    		exit;
    	}

    	if(!Hash::check($upass,$admin_user_data->upass)){
    		echo "<script>alert('用户名或者密码错误');location.href='/admin/login'</script>";
            exit;
    	}

    	// 执行登录
    	session(['admin_login'=>true]);
    	session(['admin_user'=>$admin_user_data]);

        // 登录成功后  获取当前用户的权限
        $admin_user_nodes = DB::select('select n.aname,n.cname from nodes as n,roles_nodes as rn,adminusers_roles as ur where ur.user_id = '.$admin_user_data->id.' and ur.role_id = rn.role_id and rn.node_id = n.id');
        // dd($admin_user_nodes);
        $temp = [];
        foreach($admin_user_nodes as $k=>$v){
            $temp[$v->cname][] = $v->aname;
            if($v->aname == 'create'){
                $temp[$v->cname][] = 'store';
            }

            if($v->aname == 'edit'){
                $temp[$v->cname][] = 'update';
            }

            if($v->aname == 'index'){
                $temp[$v->cname][] = 'show';           
             }
        }
         
        
        // 将用户权限压入session
        session(['admin_user_nodes'=>$temp]);


    	// 登录成功 跳转到首页
    	return redirect('admin');
    }

     // 退出登录
    public function logout()
    {
    	session(['admin_login'=>false]);
    	session(['admin_user'=>null]);

    	return back();
    }

    // 修改头像页面
    public function changeprofile($id)
    {

        return view('admin.index.changeprofile');
    }


    // 处理修改头像 操作
    public function doprofile(Request $request,$id)
    {
       
        // 文件上传
        if($request->hasFile('profile')){
             //有新的文件上传 就删除之前的旧图片
            Storage::delete($request->input('profile_path'));

            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = $request->input('profile_path');
        }

       $data['profile'] = $path;
    
       $res = DB::table('admin_users')->where('id',$id)->update($data);
        if($res){
              $new_user = DB::table('admin_users')->where('id',$id)->first();
              // dd($new_profile);
              session(['admin_user'=>$new_user]);
             return redirect('/admin/adminusers')->with('success','修改成功');
              
        }else{
             return back()->with('error','修改失败');
      }
    }


    // 后台 修改密码 页面
   public function changepass($id)
   {
        return view('admin.index.changepass');
   }

   // 
   public function dopass(Request $request,$id)
   {

       $this->validate($request,[
            'upass'=>'required',
            'pass'=>'required|regex:/^[0-9]{6,18}$/',
            'repass'=>'required|same:pass',
        ],[
            'upass.required'=>'请填写旧密码',
            'pass.required'=>'请填写新密码',
            'pass.regex'=>'新密码格式不正确',
            'repass.required'=>'请确认新密码',
            'repass.same'=>'两次密码输入不一致'
        ]);

        $oldpass = $request->input('upass','');
        $newpass = Hash::make($request->input('pass',''));
        $renewpass = Hash::make($request->input('repass',''));

        $dd = DB::table('admin_users')->where('id',$id)->first();
       
        if(!Hash::check($oldpass,$dd->upass)){
          return back()->with('error','原密码错误');
        }
       
        $data['upass'] = $newpass;
        $res = DB::table('admin_users')->where('id',$id)->update($data);
        if($res){
            return redirect('/admin/adminusers')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
   }
}


