<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use Hash;
class AdminusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收查询的数据
        $search_uname = $request->input('search_uname','');

        $admin_users_data = DB::table('admin_users')->where('uname','like','%'.$search_uname.'%')->paginate(2);

        //
        return view('admin.adminusers.index',['admin_users_data'=>$admin_users_data,'search_uname'=>$search_uname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // 获取所有的角色
        $roles_data = DB::table('roles')->get();

        return view('admin.adminusers.create',['roles_data'=>$roles_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // 开始事务
        DB::beginTransaction();
         // 验证数据
        $this->validate($request, [
             'uname' => 'required|regex:/^[\w]{6,18}$/',
             'upass' => 'required|regex:/^[\w]{6,18}$/',
             'repass' => 'required|same:upass',
             'role_id' => 'required',
             'profile' => 'required',
        ],[
             'uname.required' => '用户名必填',
             'uname.regex' => '用户名格式错误',
             'upass.required' => '密码必填',
             'upass.regex' => '密码格式错误',
             'repass.required' => '确认密码必填',
             'repass.same' => '两次密码不一致',
             'role_id.required' => '角色权限必填',
             'profile.required' => '头像必填',
        ]);

        // 文件上传
        if($request->hasFile('profile')){
            $path = $request->file('profile')->store('Ymd');
        }else{
            $path = '/ad/img/tou.jpg';
        }

        $uname = $request->input('uname','');
        $upass = $request->input('upass','');
        $repass = $request->input('repass','');
        $role_id = $request->input('role_id','');
        

        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        $temp['profile'] = $path;

        $user_id = DB::table('admin_users')->insertGetId($temp);

        $res = DB::table('adminusers_roles')->insert(['user_id'=>$user_id,'role_id'=>$role_id]);

         if($user_id && $res){
            DB::commit();
            return redirect('admin/adminusers')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $adminuser_data = DB::table('admin_users')->where('id',$id)->first();
        
         // 获取所有的角色
         $roles_data = DB::table('roles')->get();

        $role_data = DB::table('adminusers_roles')->where('user_id',$id)->first();
        // dd($roles_data);

        return view('admin.adminusers.edit',['roles_data'=>$roles_data,'adminuser_data'=>$adminuser_data,'role_data'=>$role_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      
        // 文件上传
        if($request->hasFile('profile')){
             //有新的文件上传 就删除之前的旧图片
            Storage::delete($request->input('profile_path'));

            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = $request->input('profile_path');
        }

        $uname = $request->input('uname','');
        $profile = $path;
        $role_id = $request->input('role_id','');


        $user_data = DB::table('admin_users')->where('id',$id)->update(['profile'=>$profile]);

        $res = DB::table('adminusers_roles')->where('user_id',$id)->update(['role_id'=>$role_id]);

         if($user_data && $res){
           
            return redirect('admin/adminusers')->with('success','修改成功');
        }else{
           
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
