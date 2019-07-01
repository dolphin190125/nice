<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsinfos;
use App\Models\Cars;
use App\Models\FriendsLinks;
class CarController extends Controller
{
    // 加入购物车
    public function add(Request $request)
    {
        // 获取id
        $id = $request->input('id',0);
        // 获取数量
        $num = $request->input('num','');
        // 如果本条商品没有加入购物车,就把商品存到session里面
        if(empty($_SESSION['car'][$id])){
            // 获取本条商品的id,商品名,价格
            $goods = Goods::select('id','title','price')->where('id',$id)->first();
            // 数量
            $goods->num = $num;
            // 本条商品的价格和,也就是小计
            $goods->xiaoji = ($goods->price * $goods->num);
            // 生成一个随机的订单号
            $goods->numbers = date('Ymd').mt_rand(1000, 9999);
            // 存到session里面
            $str = json_encode($goods);
            $_SESSION['car'][$id] = $str;
        }else{
            // 如果本条商品已经加入购物车了,就把数量进行累加
            $list = $_SESSION['car'][$id];
            $lists = json_decode($list);
            // 购买数量进行累加
            $lists->num = $lists->num + $num;
            // 再计算一遍价格的总和
            $lists->xiaoji = $lists->num * $lists->price;
            // 看累加后的数量
            $lists->numbers = $lists->numbers;
            // 再存一遍session
            $str = json_encode($lists);
            $_SESSION['car'][$id] = $str;
        }
        echo "<script>alert('添加购物车成功');location.href='/home/details/$id'</script>";
    }

    // 统计购物车 总数据量
    public static function countCar()
    {
        // 判断有没有session
        if(empty($_SESSION['car'])){
            // 没存session,数量就为0
            $count = 0;
        }else{
            // 把数量进行累加,返回总数量
            $count = 0;
            $list = $_SESSION['car'];
            // dd($lists);
            foreach ($list as $key => $value) {
                $vv = json_decode($value);
                // dd($vv);
                $count += $vv->num;
            }
        }
        return $count;
    }
    
    // 计算价格总和
    public static function priceCount()
    {
        if(empty($_SESSION['car'])){
            $priceCount = 0;
        }else{
            // 把session里面的小计进行累加,得到商品总和
            $priceCount = 0;
            $list = $_SESSION['car'];
            // dd($lists);
            foreach ($list as $key => $value) {
                $vv = json_decode($value);
                $priceCount += $vv->xiaoji;
            }
        }
        return $priceCount;
    }

    // 购物车的主页面
    public function index(Request $request)
    {
        // $_SESSION['car'] = null;
        // 加载模板
        if(!empty($_SESSION['car'])){
            // 获取session的数据
            $cars = $_SESSION['car'];
            // 因为加入购物车的可能有两个以上,所以遍历
            foreach($cars as $kk=>$vv){
                $aa =  json_decode($vv);
                // 拿到本条商品
                $cars_all[$aa->id] = Goods::where('id',$aa->id)->first();
                // 拿到本条的商品详情
                $cars_all[$aa->id]['infos'] = Goodsinfos::where('goods_id',$aa->id)->first();
                // 拿到数量
                $cars_all[$aa->id]['num'] = $aa->num;
                // 拿到小计
                $cars_all[$aa->id]['price'] = $aa->price * $aa->num;
            }
        }else{
            $cars_all = [];
        }
        // 拿到总价格
        $jiage = self::priceCount();
        $friends = FriendsLinks::where('status',1)->get();
        return view('home.car.index',['cars_all'=>$cars_all,'jiage'=>$jiage,'friends'=>$friends]);
    }

    // 添加数量
    public function addNum(Request $request)
    {
        // 拿到id
        $id = $request->input('id');
        // 判断session有没有数据
        if(empty($_SESSION['car'])){
            // 没数据就返回
            return back();
        }else{
            // 有数据就拿到本条数据
            $list = $_SESSION['car'][$id];
            $lists = json_decode($list);
            // 点击加一就把数量累加1
            $n = $lists->num + 1;
            // 拿到商品单价
            $price = $lists->price;
            // 拿到加一后的数量
            $lists->num = $n;
            // 算一下加一后的小计,价格
            $lists->xiaoji = ($n * $price);
            // 再存一遍session
            $str = json_encode($lists);
            $_SESSION['car'][$id] = $str;
            return back();
        }
    }

    // 减少数量
    public function descNum(Request $request)
    {
        // 获取id
        $id = $request->input('id');
        // 判断session有没有数据
        if(empty($_SESSION['car'])){
            // 没数据就返回
            return back();
        }else{
            // 有数据就拿到本条数据
            $list = $_SESSION['car'][$id];
            $lists = json_decode($list);
            // 当数量<=1的时候,就返回,不能继续点击
            if($lists->num <= 1){
                return back();
                exit;
            }
            // 给数量-1
            $n = $lists->num - 1;
            // 拿到单价
            $price = $lists->price;
            // 拿到更改后的数量
            $lists->num = $n;
            // 计算小计
            $lists->xiaoji = ($n * $price);
            // 再次存入session
            $str = json_encode($lists);
            $_SESSION['car'][$id] = $str;
            // dump($_SESSION['car'][$id]);
            return back();
        }
    } 

    // 删除数据
    public function delete(Request $request)
    {   
        $id = $request->input('id');

        if(empty($_SESSION['car'][$id])){
            return back();
        }else{
            unset($_SESSION['car'][$id]);
            return back();
        }
    }
}
