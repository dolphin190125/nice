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
            'usersinfoscontroller' => '查看用户详情',
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
            'usersinfoscontroller' => '用户详情管理',
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

        $search_rname = $request->input('search_rname','');

        $roles_data = DB::table('roles')->where('role_name','like','%'.$search_rname.'%')->paginate(3);

        //
         return view('admin.roles.index',['roles_data'=>$roles_data,'search_rname'=>$search_rname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nodes_data = DB::table('nodes')->get();

        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;

        }

       // dump($list);
        //
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
        // 开始事务
        DB::beginTransaction();
       $role_name = $request->input('role_name','');

       $node_id = $request->input('node_id');

       // 添加角色表
       $role_id = DB::table('roles')->insertGetId(['role_name'=>$role_name]);
        
        foreach($node_id as $k=>$v){
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

        $nodes_data = DB::table('nodes')->get();
        
        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;

        }
       
       $role_data = DB::table('roles')->where('id',$id)->first();
       $role_node_data = DB::table('roles_nodes')->where('role_id',$id)->get();
       $temp = [];
        foreach($role_node_data as $k=>$v){
            $temp[] = $v->node_id;
        }

        //
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

        // dump($request->all());
        //
         // 开始事务
        DB::beginTransaction();
       $role_name = $request->input('role_name','');

       $node_id = $request->input('node_id');
       // dd($node_id);
       
       // 删除角色表用户之前存在的权限
        $dd = DB::table('roles_nodes')->where('role_id',$id)->delete();
        // dump($dd);
        foreach($node_id as $k=>$v){
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
