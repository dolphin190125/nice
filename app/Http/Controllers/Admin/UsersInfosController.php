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
        // 根据用户id 查询用户的详情
        $userinfo = UsersInfos::where('users_id',$id)->first();
        
        // 显示 用户详情 列表
        return view('admin.usersinfos.index',['userinfo'=>$userinfo]);
    }

    
 
}
