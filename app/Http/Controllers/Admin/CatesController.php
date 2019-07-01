<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索的参数
        $search_cates_name = $request->input('search_cates_name','');
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->where('cates_name','like','%'.$search_cates_name.'%')->paginate(5);
        foreach($cates as $key=>$value){
            $n = substr_count($value->path,',');
            $cates[$key]->cates_name = str_repeat('|----',$n).$value->cates_name;
        }
        //显示首页模板
        return view('admin.cates.index',['cates'=>$cates,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id',0);
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach($cates as $key=>$value){
            $n = substr_count($value->path,',');
            $cates[$key]->cates_name = str_repeat('|----',$n).$value->cates_name;
        }
        // dd($cates);
        // 显示添加模板
        return view('admin.cates.create',['cates'=>$cates,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取pid
        $pid = $request->input('pid',0);
        if($pid == 0){
            $path = 0;
        }else{
            // 获取父级数据
            $parent_data = Cates::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }
        // 将数据压入到数据库
        $cate = new Cates;
        $cate->cates_name = $request->input('cates_name','');
        $cate->pid = $pid;
        $cate->path = $path;
        $res1 = $cate->save();
        if($res1){
            return redirect('admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
    
}
