<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
class ShowController extends Controller
{
	// 首页横栏的显示,让三级标题是否显示的方法
    public function sta(Request $request,$id)
    {
    	// 获取这一条数据
    	$cate = Cates::where('id',$id)->first();
    	// 修改字段
    	$cate->status = 1;
    	$res1 = $cate->save();
        if($res1){
            return redirect('admin/cates')->with('success','显示成功');
        }else{
            return back()->with('error','显示失败');
        }
    	// dd($cate);
    }
    public function desta(Request $request,$id)
    {
    	// 获取这一条数据
    	$cate = Cates::where('id',$id)->first();
    	// 修改字段
    	$cate->status = 0;
    	$res1 = $cate->save();
        if($res1){
            return redirect('admin/cates')->with('success','取消成功');
        }else{
            return back()->with('error','取消失败');
        }
    	// dd($cate);
    }

}
