<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use App\Models\UsersInfos;
use Hash;
use DB;
use App\Http\Requests\StoreUsers;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        // 接收搜索的参数
        $search_uname = $request->input('search_uname','');
        $search_email = $request->input('search_email','');


        // 获取表中全部数据  进行遍历 得到用户列表页面
       $users = Users::where('uname','like','%'.$search_uname.'%')->where('email','like','%'.$search_email.'%')->paginate(2);


        // 显示 用户列表页面
        return view('admin.user.index',['users'=>$users,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示用户添加页面
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
        // 开启事务  使用户表和用户详情表同时添加数据
        DB::beginTransaction();

        // 上传头像
        if($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        // 执行用户添加操作
        $data = $request->all();
        
        // 接收数据
        $user = new Users;
        $user->uname = $data['uname'];
        $user->upass = Hash::make($data['upass']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->status = $data['status'];
        // 执行添加操作
        $res1 = $user->save();
        // 如果添加成功 取出id
        if($res1){
            $uid = $user->id;
        }

        // 压入头像
        $userinfo = new UsersInfos;
        $userinfo->users_id = $uid;
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

        if($res1 && $res2){
            // 如果两个表都插入成功 就提交事务
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
        }else{
            // 否则 就执行事务回滚
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
        // 根据id查询要修改的数据
        $user = Users::find($id);

        // 显示 修改页面
        return view('admin.user.edit',['user'=>$user]);
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
        dd($id);
        // 验证数据
        $this->validate($request, [
             'email' => 'required|email',
             'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
        ],[
             'email.required' => '邮箱必填',
             'emial.regex' => '邮箱格式错误',
             'phone.required' => '电话必填',
             'phone.regex' => '电话格式错误',
        ]);
        // 处理 修改 操作
        //  开启事务  确保两个表同时修改数据
          DB::beginTransaction();
        // 获取头像
        if($request->hasFile('profile')){
            // 如果有新上传的头像  就删除之前的旧头像
            Storage::delete($request->input('old_profile'));
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }

        $user = Users::find($id);
        $user->email = $request->input('email','');
        $user->phone = $request->input('phone','');
        $user->status = $request->input('status',0);
        $res1 = $user->save();

        $userinfo = UsersInfos::where('users_id',$id)->first();
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

         if($res1 && $res2){
            // 如果两个表都修改成功 就提交事务
            DB::commit();
            return redirect('admin/users')->with('success','修改成功');
        }else{
            // 否则 就执行事务回滚
            DB::rollBack();
            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // 开启事务 要同时删除两个表中的数据
        DB::beginTransaction();
        // 删除 users表中数据
        $res1 = Users::destroy($id);
        $res2 = UsersInfos::where('users_id',$id)->delete();

        // 删除用户头像
       
        if($request->hasFile('profile')){
             Storage::delete($request->input('profile'));
        }
            
        if($res1 && $res2){
            // 如果两个表都删除成功 就提交事务
            DB::commit();
            return redirect('admin/users')->with('success','删除成功');
        }else{
            // 否则 就执行事务回滚
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
