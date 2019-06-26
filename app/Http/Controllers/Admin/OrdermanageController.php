<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
class OrdermanageController extends Controller
{
    public function index(Request $request)
    {
        // 根据条件查询
        $orders = Orders::paginate(6);

        // 显示 品牌列表页面
        return view('admin.ordermanage.index',['orders'=>$orders,'params'=>$request->all()]);
    }

    public function info($id)
    {
        // 根据条件查询
        $order = Orders::where('id',$id)->first();
        // dd($order);
        // 显示 品牌列表页面
        return view('admin.ordermanage.info',['order'=>$order]);
    }
    // 订单发货 
    public function send($id)
    {
        $order = Orders::where('id',$id)->first();
        $order->status = 1;
        $res = $order->save();
        if($res){
            return redirect('admin/ordermanage/index')->with('success','发货成功');
        }else{
            return back()->with('error','添加失败');
        }
    } 
    public function cancel($id)
    {
        $order = Orders::where('id',$id)->first();
        $order->status = 3;
        $res = $order->save();
        if($res){
            return redirect('admin/ordermanage/index')->with('success','取消订单成功');
        }else{
            return back()->with('error','添加失败');
        }
    }  
    public function apply($id)
    {
        $order = Orders::where('id',$id)->first();
        $order->status = 4;
        $res = $order->save();
        if($res){
            return redirect('home/order/myorder');
        }else{
            return back();
        }
    }
      
    public function confirm($id)
    {
        $order = Orders::where('id',$id)->first();
        $order->status = 2;
        $res = $order->save();
        if($res){
            return redirect('home/order/myorder');
        }else{
            return back();
        }
    }
}
