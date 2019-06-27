<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsinfos;
use App\Models\Addresses;
use App\Models\Cars;
use App\Models\Orders;
use App\Models\Speaks;
use App\Http\Controllers\Home\CarController;
class OrderController extends Controller
{
    // 加载添加地址的页面
    public function create()
    {
        return view('home.order.create');
    }
    public function index(Request $request)
    {
        // 没登录不能生成订单,退到登录页面
        if(empty(session('home_login'))){
            return view('home.login.index');
        }
        $data = $request->all();
        $id = $data['ad'];
        $pay = $data['pay'];
        $adds = Addresses::where('id',$id)->first();
        $list = $_SESSION['car'];
        // 添加订单表
        foreach($list as $k=>$v){
            $orders = new Orders;
            $lists = json_decode($v);
            $orders->orders_numbers = $lists->numbers;
            $orders->priceall = $lists->price * $lists->num;
            $orders->users_id = session('home_user')->id;
            $orders->address_id = $adds->id;
            $orders->goods_id = $lists->id;
            $orders->numbers = $lists->num;
            $orders->prices = $lists->price;
            $orders->status = 0;
            $orders->pay = $pay;
            $orders->save();
        }
        return redirect('home/order/myods');
    } 
    // 生成订单的页面
    public function myods()
    {
        // 拿到session里面的数据
        $list = $_SESSION['car'];
        foreach($list as $k=>$v){
            $ods[] = json_decode($v);
        }
        $zong = 0;
        // 获取总价钱
        foreach($ods as $k=>$v){
            $zong += $v->price;
        }
        return view('home.order.index',['ods'=>$ods,'zong'=>$zong]);
    }
	// 结算页面
    public function account(Request $request)
    {
    	// $_SESSION['car'] = null;
        // 加载模板
        if(!empty($_SESSION['car'])){
            $cars = $_SESSION['car'];
            // dd($cars);
            foreach($cars as $kk=>$vv){
                $aa =  json_decode($vv);
                $cars_all[$aa->id] = Goods::where('id',$aa->id)->first();
                $cars_all[$aa->id]['infos'] = Goodsinfos::where('goods_id',$aa->id)->first();
                $cars_all[$aa->id]['num'] = $aa->num;
                $cars_all[$aa->id]['price'] = $aa->price * $aa->num;
            }
            // dd($cars_all);
        }else{
            $cars_all = [];
        }
        // 总价格
        $jiage = CarController::priceCount();
        if(empty(session('home_login'))){
            return view('home.login.index');
        }
        // dd(session('home_user')->id);
        $address = Addresses::where('users_id',session('home_user')->id)->get();
        
        // dd($cars_all);
        return view('home.order.account',['cars_all'=>$cars_all,'jiage'=>$jiage,'address'=>$address]);
    }
    // 执行添加地址的方法
    public function add(Request $request)
    {
        // 验证数据
        $this->validate($request, [
             'name' => 'required',
             'phone' => 'required',
             'address' => 'required',
             
        ],[
             'name.required' => '收货人姓名必填',
             'phone.required' => '联系方式必填',
             'address.required' => '详细地址必填',
        ]);
        // 执行地址添加操作
        $data = $request->all();
        // 接收数据
        $addresses = new Addresses;
        $addresses->name = $data['name'];
        $addresses->phone = $data['phone'];
        $addresses->address = $data['address'];
        $addresses->users_id = session('home_user')->id;
        // 执行添加操作
        $res1 = $addresses->save();
        if($res1){
            return redirect('home/order/account')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
    // 查看我的订单
    public function myorder()
    {
        $allods = Orders::where('users_id',session('home_user')->id)->get();
        unset($_SESSION['car']);
        return view('home.order.myorder',['allods'=>$allods]);
    }
    // 加载评论页面
    public function speak($id)
    {
        $order = Orders::where('id',$id)->first();
        return view('home.order.speak',['order'=>$order]);
    }
    // 执行评论的添加
    public function dospeak(Request $request,$id)
    {   if($request->hasFile('pic')){
            $file_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        // dd($file_path);
        // dd($request->all());
        $ors = Orders::where('id',$id)->first();
        // 上传图片
        
        
        // 执行添加操作
        $data = $request->all();
        // 接收数据
        $speaks = new Speaks;
        $speaks->users_id = session('home_user')->id;
        $speaks->goods_id = $ors->goods_id;
        $speaks->speak = $data['spe'];
        $speaks->start = $data['start'];
        $speaks->picture = $file_path;
        $res1 = $speaks->save();
        if($res1){
            echo "<script>alert('评论成功');location.href='/home/order/myorder'</script>";
        }else{
            return back()->with('error','添加失败');
        }
    }
}
