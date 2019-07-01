<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RolesController extends Controller
{
    public static function controller()
    {
        return [
            'userscontroller' => '用户管理',
            'usersinfoscontroller' => '用户详情管理',
            'brandscontroller' => '商品品牌管理',
            'bannerscontroller' => '轮播图管理',
            'catescontroller' => '商品分类管理',
            'goodscontroller' => '商品管理',
            'goodsinfoscontroller' => '商品详情管理',
            'friendslinkscontroller' => '友情链接管理',
            'speakcontroller' => '评论管理',
            'tagnamescontroller' => '标签云管理',
            'adminuserscontroller' => '管理员管理',
            'rolescontroller' => '角色管理',
            'nodescontroller' => '权限管理',
            'ordermanagecontroller' => '订单管理',
            'indexcontroller' => '后台首页',
           ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索数据
        $search_rname = $request->input('search_rname','');
        // 
        $roles_data = DB::table('roles')->where('role_name','like','%'.$search_rname.'%')->paginate(3);

        //加载页面 分配数据到 页面中
         return view('admin.roles.index',['roles_data'=>$roles_data,'search_rname'=>$search_rname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有权限
        $nodes_data = DB::table('nodes')->get();
        // 声明一个空数组 用来放所有的权限中的控制器和对应的方法
        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;
        }

       // dump($list);
        //加载页面 分配数据到页面中
        return view('admin.roles.create',['list'=>$list,'controller'=>self::controller()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行添加操作
        // 开始事务
        DB::beginTransaction();
        // 获取接收到的数据
       $role_name = $request->input('role_name','');

       $node_id = $request->input('node_id');

       // 添加角色表 获取刚添加到角色表中的id
       $role_id = DB::table('roles')->insertGetId(['role_name'=>$role_name]);
        // 获取所有的权限 根据node_id
        foreach($node_id as $k=>$v){
            // 执行添加操作 
           $res = DB::table('roles_nodes')->insert(['role_id'=>$role_id,'node_id'=>$v]);
        }
        
        if($role_id && $res){
            DB::commit();
            return redirect('admin/roles')->with('success','添加成功');
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
        // 获取所有的权限
        $nodes_data = DB::table('nodes')->get();
        // 声明一个空数组 用来放所有的权限中的控制器和对应的方法
        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;

        }
        // 根据id 找到roles表中需要修改的角色 
       $role_data = DB::table('roles')->where('id',$id)->first();
       // 根据id 找到roles_nodes表中角色需要修改的数据 
       $role_node_data = DB::table('roles_nodes')->where('role_id',$id)->get();
       // 声明一个空数组 用来存放角色名所拥有的权限id
       $temp = [];
        foreach($role_node_data as $k=>$v){
            $temp[] = $v->node_id;
        }

        // 加载页面 分配数据到页面中
        return view('admin.roles.edit',['list'=>$list,'role_data'=>$role_data,'controller'=>self::controller(),'temp'=>$temp]);
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

        
        // 执行修改操作
         // 开始事务
        DB::beginTransaction();
        // 接收数据
       $role_name = $request->input('role_name','');

       $node_id = $request->input('node_id');
       // dd($node_id);
       
       // 删除角色表用户之前存在的权限
        $dd = DB::table('roles_nodes')->where('role_id',$id)->delete();
        // 获取所有的权限id 
        foreach($node_id as $k=>$v){
            // 执行添加操作
            $res = DB::table('roles_nodes')->insert(['role_id'=>$id,'node_id'=>$v]);
        }

        if($dd && $res){
            DB::commit();
            return redirect('admin/roles')->with('success','修改成功');
        }else{
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
    public function destroy($id)
    {
        //
    }
}
