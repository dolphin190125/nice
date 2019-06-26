<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tagnames;
class TagnamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索数据 
        $search_tagname = $request->input('search_tagname','');

        // 从标签云表中搜 所有数据进行遍历 得到列表页面
        $tags_data = Tagnames::where('tag_name','like','%'.$search_tagname.'%')->orderby('status','asc')->paginate(3);

        return view('admin.tagnames.index',['tags_data'=>$tags_data,'search_tagname'=>$search_tagname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tagnames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // 处理 添加操作
        $data = $request->all();
        $tagname = new Tagnames;
        // 
        $tagname->tag_name = $data['tag_name'];
        $tagname->status = $data['status'];
        // 执行数据库添加操作
        $res = $tagname->save();
         if($res){
            return redirect('admin/tagnames')->with('success','添加成功');
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
        //
        $tag_data = Tagnames::find($id);
        return view('admin.tagnames.edit',['tag_data'=>$tag_data]);
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
       $tagdata = Tagnames::find($id);
       $tagdata->tag_name = $request->input('tag_name','');
       $tagdata->status = $request->input('status',1);
       $res = $tagdata->save();
        if($res){
            return redirect('admin/tagnames')->with('success','修改成功');
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
        // 根据id 找到需要删除的数据 进行删除
        $res = Tagnames::destroy($id);

        if($res){
            return redirect('admin/tagnames')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
