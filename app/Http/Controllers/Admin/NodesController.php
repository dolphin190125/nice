<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        // 接收 搜索数据
        $search_desc = $request->input('search_desc','');

        $nodes_data = DB::table('nodes')->where('desc','like','%'.$search_desc.'%')->paginate(8);

        //加载页面 分配数据到页面中
        return view('admin.nodes.index',['nodes_data'=>$nodes_data,'search_desc'=>$search_desc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加页面
        return view('admin.nodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加操作
        // 接收要添加的数据
        $cname = $request->input('cname','');
        $controller = $cname.'controller';

        $aname = $request->input('aname','');

        $desc = $request->input('desc');
        // 执行添加入库操作
        $res = DB::table('nodes')->insert(['cname'=>$controller,'aname'=>$aname,'desc'=>$desc]);

        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
        }else{
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
        // 找到需要修改的权限
       $node_data =  DB::table('nodes')->where('id',$id)->first();

        //加载页面 分配数据到页面中
        return view('admin.nodes.edit',['node_data'=>$node_data]);
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

        // 接收修改后的数据
        $data['desc'] = $request->input('desc','');
        $data['cname'] = $request->input('cname','');
        $data['aname'] = $request->input('aname','');
        // 执行添加操作
        $res = DB::table('nodes')->where('id',$id)->update($data);

        if($res){
            return redirect('admin/nodes')->with('success','修改成功');
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
