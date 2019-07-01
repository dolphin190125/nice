<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Brands;
use App\Models\Cates;
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 接收 搜索数据
        $search_bname = $request->input('search_bname','');
        // 根据条件查询
        $brands = Brands::where('bname','like','%'.$search_bname.'%')->paginate(3);

        // 显示 品牌列表页面
        return view('admin.brands.index',['brands'=>$brands,'search_bname'=>$search_bname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cates = Cates::all();
        // 显示 添加页面
        return view('admin.brands.create',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证数据
        $this->validate($request, [
            'bname' => 'required|max:128',
            'img' => 'required',
        ],[
            'bname.required' => '品牌名必填',
            'img.required' => '品牌图片必填',
            'bname.max' => '品牌名称过长',
        ]);
        // 上传品牌图片
        if($request->hasFile('img')){
            $brands_path = $request->file('img')->store(date('Ymd'));
        }else{
            $brands_path = '';
        }
        // 处理 添加操作
        $data = $request->all();
        $brand = new Brands;
         
        $brand->bname = $data['bname'];
        $brand->img = $brands_path;
        $brand->cates_id = $data['cates_id'];
        $brand->status = 0;
        // 执行数据库添加操作
        $res = $brand->save();
         if($res){
            return redirect('admin/brands')->with('success','添加成功');
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
<<<<<<< HEAD
        $cates = Cates::all();
        
=======
        // 找到需要修改的数据
>>>>>>> origin/wwx
        $brand = Brands::find($id);
        $cate = Cates::find($brand->cates_id);
        $cates_id=$cate->id;
        // 显示 品牌修改页面
        return view('admin.brands.edit',['brand'=>$brand,'cates'=>$cates,'cates_id'=>$cates_id]);
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
        // 处理 修改 页面
         // 上传修改品牌图片
        if($request->hasFile('img')){
            // 如果有图片上传 就删除之前的旧图片
             Storage::delete($request->input('img'));
            $brands_path = $request->file('img')->store(date('Ymd'));
        }else{
            $brands_path = $request->input('old_img');
        }
        // 找到需要修改的数据 执行修改
        $brand = Brands::find($id);
        
        $brand->img = $brands_path;
        $brand->status = $request->input('status');
        $brand->cates_id = $request->input('cates_id','');
        // 执行数据库添加操作
        $res = $brand->save();
         if($res){
            return redirect('admin/brands')->with('success','修改成功');
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
        $res = Brands::destroy($id);
         if($res){
            return redirect('admin/brands')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
