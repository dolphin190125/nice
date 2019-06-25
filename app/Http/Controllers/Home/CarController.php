<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsinfos;
use App\Models\Cars;
class CarController extends Controller
{
    // 加入购物车
    public function add(Request $request)
    {
        // $_SESSION['car'] = null;
        // exit;

        $id = $request->input('id',0);
        $num = $request->input('num','');
        // dd($num);
        if(empty($_SESSION['car'][$id])){
            $goods = Goods::select('id','title','price')->where('id',$id)->first();
            $goods->num = $num;
            $goods->xiaoji = ($goods->price * $goods->num);
            $str = json_encode($goods);
            $_SESSION['car'][$id] = $str;
        }else{
            $list = $_SESSION['car'][$id];
            $lists = json_decode($list);
            // dd($lists->num);
            $lists->num = $lists->num + $num;
            $lists->xiaoji = $lists->num * $lists->price;
            $str = json_encode($lists);

            $_SESSION['car'][$id] = $str;
        }
        echo "<script>alert('添加购物车成功');location.href='/home/details/$id'</script>";
    }

    // 统计购物车 总数据量
    public static function countCar()
    {

        if(empty($_SESSION['car'])){
            $count = 0;
        }else{
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

    public static function priceCount()
    {
        if(empty($_SESSION['car'])){
            $priceCount = 0;
        }else{
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

    public function index(Request $request)
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
        $jiage = self::priceCount();

        return view('home.car.index',['cars_all'=>$cars_all,'jiage'=>$jiage]);
    }

    
    // 添加数量
    public function addNum(Request $request)
    {
        $id = $request->input('id');

        if(empty($_SESSION['car'])){
            return back();
        }else{
            $list = $_SESSION['car'][$id];
            $lists = json_decode($list);
            $n = $lists->num + 1;
            $price = $lists->price;

            $lists->num = $n;
            $lists->xiaoji = ($n * $price);
            $str = json_encode($lists);
            $_SESSION['car'][$id] = $str;
            return back();
        }
    }

    // 减少数量
    public function descNum(Request $request)
    {
        $id = $request->input('id');

        if(empty($_SESSION['car'])){
            return back();
        }else{
            $list = $_SESSION['car'][$id];
            $lists = json_decode($list);
            if($lists->num <= 1){
                return back();
                exit;
            }
            $n = $lists->num - 1;
            $price = $lists->price;

            $lists->num = $n;
            $lists->xiaoji = ($n * $price);
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
