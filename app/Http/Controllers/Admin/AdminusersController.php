<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // 
        $admin_users_data = DB::table('admin_users')->where('uname','like','%'.$search_uname.'%')->paginate(2);

        // 加载页面 后台用户
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
        // 加载添加页面
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
        // 接收添加的数据
        $uname = $request->input('uname','');
        $upass = $request->input('upass','');
        $repass = $request->input('repass','');
        $role_id = $request->input('role_id','');
        
        // 将数据分别放入数组中 用户插入到库中
        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        $temp['profile'] = $path;
        // 拿到刚插入的用户id
        $user_id = DB::table('admin_users')->insertGetId($temp);
        // 将用户id 添加到adminusers_roles表中 用于查看用户和角色之间的关系
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
        // 根据用户id 查询到需要修改的用户数据
        $adminuser_data = DB::table('admin_users')->where('id',$id)->first();
        
         // 获取所有的角色
        $roles_data = DB::table('roles')->get();
        // 通过用户id 在关系表中查询出当前用户的角色
        $role_data = DB::table('adminusers_roles')->where('user_id',$id)->first();
        
        // 加载修改页面 并将数据分配到页面中
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
       
        // 获取到修改的数据
        $uname = $request->input('uname','');
        $role_id = $request->input('role_id','');
        // 修改当前用户的角色
        $res = DB::table('adminusers_roles')->where('user_id',$id)->update(['role_id'=>$role_id]);

        if($res){
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
