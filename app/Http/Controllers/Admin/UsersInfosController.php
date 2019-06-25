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

    
 
}
