<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Banners;
class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // 接收 搜索数据
        $search_title = $request->input('search_title','');


        $banners = Banners::where('title','like','%'.$search_title.'%')->paginate(5);

        // 显示 轮播图 列表页面
        return view('admin.banners.index',['banners'=>$banners,'search_title'=>$search_title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载 添加 页面
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行 添加  操作
         // 上传轮播图图片
        if($request->hasFile('pic')){
            $banners_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $banners_path = '';
        }
        // 接收所有form表单传过来的数据
        $data = $request->all();
        // 执行添加操作
        $banner = new Banners;
        $banner->title = $data['title'];
        $banner->desc = $data['desc'];
        $banner->status = $data['status'];
        $banner->type = $data['type'];
        $banner->pic = $banners_path;
        // 存库
        $res = $banner->save();
        if($res){
            return redirect('admin/banners')->with('success','添加成功');
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
        // 根据id 找到需要修改的数据
       $banner = Banners::find($id);

        // 加载修改 页面 分配数据到页面中
        return view('admin.banners.edit',['banner'=>$banner]);
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
        
        // 处理 修改 操作
        // 轮播图图片上传
        if($request->hasFile('pic')){
            // 如果有新图片上传 就删除之前的旧图片
            Storage::delete($request->input('pic'));
            $banners_path = $request->file('pic')->store(date('Ymd'));
        }else{
            // 如果没有新图片上传 还采用之前的旧图片
            $banners_path = $request->input('old_pic');
        }
        // 找到需要修改的数据 执行修改操作
        $banner = Banners::find($id);
        $banner->title = $request->input('title','');
        $banner->desc = $request->input('desc','');
        $banner->pic = $banners_path;
        $banner->status=$request->input('status','');
        $banner->type=$request->input('type','');
        $res = $banner->save();
         if($res){
            return redirect('admin/banners')->with('success','修改成功');
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
        // 删除数据操作
        $res = Banners::destroy($id);
         if($res){
            return redirect('admin/banners')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

   
}
