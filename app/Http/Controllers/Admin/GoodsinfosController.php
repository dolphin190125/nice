<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Goodsinfos;
use DB;
use Illuminate\Support\Facades\Storage;
class GoodsinfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 获取商品表的id
        $goods = Goods::find($id);
        // 获取商品详情表的相关数据
        $goodsinfos = Goodsinfos::where('goods_id',$id)->get();
        // 如果没有详情,显示暂无数据
        if(empty($goodsinfos[0])){
            return back()->with('error','暂无数据');
        }
        // 显示首页模板
        return view('admin.goodsinfos.index',['goods'=>$goods,'goodsinfos'=>$goodsinfos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // 根据id查询要修改的数据
        $goods = Goods::find($id);
        $goodsinfos = Goodsinfos::where('goods_id',$id)->get();
        // 如果有数据,不能再次添加,只能查看
        if(!empty($goodsinfos[0])){
            return back()->with('error','已添加,请查看');
        }
        // 显示 修改页面
        return view('admin.goodsinfos.create',['goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // 上传商品图片1
        if($request->hasFile('pic1')){
            $file_path1 = $request->file('pic1')->store(date('Ymd'));
        }else{
            $file_path1 = '';
        }
        // 上传商品图片2
        if($request->hasFile('pic2')){
            $file_path2 = $request->file('pic2')->store(date('Ymd'));
        }else{
            $file_path2 = '';
        }
        // 上传商品图片3
        if($request->hasFile('pic3')){
            $file_path3 = $request->file('pic3')->store(date('Ymd'));
        }else{
            $file_path3 = '';
        }
         // 验证数据
        $this->validate($request, [
             'desc' => 'required',
             'capa' => 'required',
             'taste' => 'required',
        ],[
             'desc.required' => '商品描述必填',
             'capa.required' => '商品型号必填',
             'taste.required' => '商品属性必填',
        ]);
        // 执行用户添加操作
        $data = $request->all();
        $goodsinfos = new Goodsinfos;
        // 接收数据
        $goodsinfos->desc = $data['desc'];
        $goodsinfos->goods_id = $id;
        $goodsinfos->capa = $data['capa'];
        $goodsinfos->taste = $data['taste'];
        $goodsinfos->pic1 = $file_path1;
        $goodsinfos->pic2 = $file_path2;
        $goodsinfos->pic3 = $file_path3;
        // 执行添加操作
        $res1 = $goodsinfos->save();
        if($res1){
            return redirect('admin/goods')->with('success','添加成功');
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
        // 根据id查询要修改的数据
        $goods = Goods::find($id);
        // 获取商品详情表的相关数据
        $goodsinfos = Goodsinfos::where('goods_id',$id)->get();
        // 显示 修改页面
        return view('admin.goodsinfos.edit',['goodsinfos'=>$goodsinfos,'goods'=>$goods]);
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
        // 确认是否更改图片1
        if($request->hasFile('pic1')){
            Storage::delete($request->input('pic1_path'));
            $path1 = $request->file('pic1')->store(date('Ymd'));
        }else{
            $path1 = $request->input('pic1_path','');
        }
        // 确认是否更改图片2
        if($request->hasFile('pic2')){
            Storage::delete($request->input('pic2_path'));
            $path2 = $request->file('pic2')->store(date('Ymd'));
        }else{
            $path2 = $request->input('pic2_path','');
        }
        // 确认是否更改图片3
        if($request->hasFile('pic3')){
            Storage::delete($request->input('pic3_path'));
            $path3 = $request->file('pic3')->store(date('Ymd'));
        }else{
            $path3 = $request->input('pic3_path','');
        }
        // 获取修改的数据
        $goodsinfos = Goodsinfos::find($id);
        $goodsinfos->desc = $request->input('desc','');
        $goodsinfos->capa = $request->input('capa','');
        $goodsinfos->taste = $request->input('taste','');
        $goodsinfos->pic1 = $path1;
        $goodsinfos->pic2 = $path2;
        $goodsinfos->pic3 = $path3;
        // 执行修改操作
        $res2 = $goodsinfos->save();
        if($res2){
            return redirect('admin/goods')->with('success','修改成功');
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
    public function destroy(Request $request, $id)
    {
        // 获取本条商品详情,删除掉
        $res1 = Goodsinfos::destroy($id);
        // 删除图片详情1
        if($request->hasFile('pic1')){
             Storage::delete($request->input('pic1'));
        }
        // 删除图片详情2
        if($request->hasFile('pic2')){
             Storage::delete($request->input('pic2'));
        }
        // 删除图片详情3
        if($request->hasFile('pic3')){
             Storage::delete($request->input('pic3'));
        }
        // 执行删除操作
        if($res1){
            return redirect('admin/goods')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
