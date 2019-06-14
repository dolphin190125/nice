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


        $banners = Banners::where('title','like','%'.$search_title.'%')->paginate(2);

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
        //显示 添加 页面
        
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

        $banner = new Banners;
        $banner->title = $data['title'];
        $banner->desc = $data['desc'];
        $banner->pic = $banners_path;
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
       $banner = Banners::find($id);

        // 显示 修改 页面
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
            Storage::delete($request->input('pic'));
            $banners_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $banners_path = $request->input('old_pic');
        }
        $banner = Banners::find($id);
        $banner->title = $request->input('title','');
        $banner->desc = $request->input('desc','');
        $banner->pic = $banners_path;
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
        // 删除数据
        $res = Banners::destroy($id);
         if($res){
            return redirect('admin/banners')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    // 处理 未开启 已开启状态
    public function changeStatus(Request $request)
    {
        $id = $request->input('id',0);
       
        $data = Banners::find($id);

        $status = $data->status;

        if($status == 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $res = DB::table('banners')->where('id',$id)->update(['status'=>$status]);
        if($res){
            if($status == 1){
                echo 'ok';
            }else{
                echo 'xx';
            }
        }else{
            echo 'err';
        }
    }
}
