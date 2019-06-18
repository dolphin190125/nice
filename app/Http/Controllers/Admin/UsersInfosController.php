<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersInfos;
class UsersInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        
        $userinfo = UsersInfos::where('users_id',$id)->first();
        
        // 显示 用户详情 列表
        return view('admin.usersinfos.index',['userinfo'=>$userinfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {
        
    //     $users = Users::find($id);
        
    //     // 显示 添加详情 页面
    //     return view('admin.usersinfos.create',['users'=>$users]);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request,$id)
    // {

    //     // 验证数据
    //      $this->validate($request, [
    //         'sex' => 'required',
    //         'addr' => 'required|max:128',
    //     ],[
    //         'sex.required' => '性别必填',
    //         'addr.required' => '地址必填',
    //         'addr.max' => '地址过长',
    //     ]);
    //     //处理 添加操作
    //     //
    //     $uinfo = new UsersInfos;
    //     // 根据 用户表的id 找到用户详情表 执行添加
    //     $usersinfo = UsersInfos::where('users_id',$id)->first();
       

    //     $usersinfo->users_id = $id;
    //     $usersinfo->sex = $request->input('sex','');
    //     $usersinfo->age = $request->input('age',0);
    //     $usersinfo->addr = $request->input('addr','');

    //     $res = $usersinfo->save();
    //     if($res){
           
    //         return redirect('admin/users')->with('success','添加成功');
    //     }else{
           
    //         return back()->with('error','添加失败');
    //     }
    // }

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
        // 根据id 找到需要修改的数据
        $userinfo = UsersInfos::find($id);
      
        // 显示 修改 页面
        return view('admin.usersinfos.edit',['userinfo'=>$userinfo]);
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
        // 处理 修改  操作
       // 验证数据
         $this->validate($request, [
            'sex' => 'required',
            'addr' => 'required|max:128',
        ],[
            'sex.required' => '性别必填',
            'addr.required' => '地址必填',
            'addr.max' => '地址过长',
        ]);
        //处理 添加操作
        //
        $uinfo = new UsersInfos;
        // 根据 用户详情表id   执行添加
        $usersinfo = UsersInfos::find($id);
        // 根据详情表中的users_id 得到用户表中的id
        $uid = $usersinfo->users_id;
        // 找出用户表中相应的数据
        $users = Users::where('id',$uid)->first();
        
        // 
         $usersinfo->users_id = $users->id;
        $usersinfo->sex = $request->input('sex','');
        $usersinfo->age = $request->input('age',0);
        $usersinfo->addr = $request->input('addr','');

        $res = $usersinfo->save();
        if($res){
           
            return redirect('admin/users')->with('success','修改成功');
        }else{
           
            return back()->with('error','修改失败');
        }
    }
 
}
