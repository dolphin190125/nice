<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Goodsinfos;
use Illuminate\Support\Facades\Storage;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索
        $search_title = $request->input('search_title','');
        // 分页
        $goods = Goods::where('title','like','%'.$search_title.'%')->paginate(5);
        // 获取分类和品牌
        foreach($goods as $k=>$v){
            $cate = Cates::find($v->cates_id);
            $brand = Brands::find($v->brands_id);
            $v->cates_name = $cate->cates_name;
            $v->brands_name = $brand->bname;
        }
        // 加载商品列表页面
        return view('admin.goods.index',['goods'=>$goods,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取分类和品牌
        $brands = Brands::all();
        $cates = Cates::all();
        //加载商品添加页面
        return view('admin.goods.create',['brands'=>$brands,'cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 上传商品图片
        if($request->hasFile('pic')){
            $file_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        // 验证数据
        $this->validate($request, [
             'title' => 'required',
             'cates_id' => 'required',
             'brands_id' => 'required',
             'price' => 'required',
             'store' => 'required',
             
        ],[
             'title.required' => '商品名必填',
             'cates_id.required' => '所属分类必填',
             'brands_id.required' => '所属品牌必填',
             'price.required' => '价格必填',
             'title.required' => '商品库存必填',
        ]);
        // 执行用户添加操作
        $data = $request->all();
        // 接收数据
        $good = new Goods;
        $good->title = $data['title'];
        $good->cates_id = $data['cates_id'];
        $good->brands_id = $data['brands_id'];
        $good->price = $data['price'];
        $good->store = $data['store'];
        $good->pic = $file_path;
        $good->sale = rand(1000,9999);
        $good->status = 0;
        $good->recommend = $data['recommend'];
        // 执行添加操作
        $res1 = $good->save();
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
        // 获取分类和品牌
        $cates = Cates::all();
        $brands = Brands::all();
        // 获取分类和品牌的id
        $cate = Cates::find($goods->cates_id);
        $brand = Brands::find($goods->brands_id);
        $cates_id=$cate->id;
        $brands_id=$brand->id;
        // 显示 修改页面
        return view('admin.goods.edit',['goods'=>$goods,'cates'=>$cates,'brands'=>$brands,'cates_id'=>$cates_id,'brands_id'=>$brands_id]);
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

        // 确认是否更改图片,改过了就删除原来的,没改就默认还是原来的
        if($request->hasFile('pic')){
            Storage::delete($request->input('pic_path'));
            $path = $request->file('pic')->store(date('Ymd'));
        }else{
            $path = $request->input('pic_path','');
        }
        // 执行修改
        $goods = Goods::find($id);
        $goods->title = $request->input('title','');
        $goods->cates_id = $request->input('cates_id','');
        $goods->brands_id = $request->input('brands_id','');
        $goods->price = $request->input('price','');
        $goods->store = $request->input('store','');
        $goods->status = $request->input('status','');
        $goods->recommend = $request->input('recommend','');
        $goods->pic = $path;
        // 执行修改操作
        $res1 = $goods->save();
        if($res1){
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
    public function destroy(Request $request,$id)
    {
        // 开启事务 要同时删除两个表中的数据
        DB::beginTransaction();
        // 删除 商品表中的数据 
        $res1 = Goods::destroy($id);
        $res2 = Goodsinfos::where('goods_id',$id)->delete();
        // 删除图片
        if($request->hasFile('pic')){
             Storage::delete($request->input('pic'));
        } 
        if($res1 || $res2){
            // 如果两个表有一方删除成功 就提交事务
            DB::commit();
            return redirect('admin/goods')->with('success','删除成功');
        }else{
            // 否则 就执行事务回滚
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
