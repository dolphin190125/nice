<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Brands;
use App\Models\Speaks;
use App\Models\Goodsinfos;
use App\Models\FriendsLinks;
use App\Http\Controllers\Home\CarController;
class DetailsController extends Controller
{
    // 商品详情页
    public function index(Request $request,$id)
    {
        // 拿到CarController下面的countCar方法,统计购物车的总数量,在购物车( n )显示
        $countCar = CarController::countCar();
        // 拿到本条商品的数据
        $goods = Goods::where('id',$id)->first();
        // 拿到本商品的所有评论
        $speak = Speaks::where('goods_id',$id)->get();
        // 拿到本商品的商品详情
        $goodsinfos = Goodsinfos::where('goods_id',$goods->id)->first();
        $gooddata = Goods::all();
        // foreach($gooddata as $k=>$v){
        //     $value = $v->status;
        // }
        $friends = FriendsLinks::where('status',1)->get();
        // 如果没有详情,就返回
        if(empty($goodsinfos)){
            return back();
        }
        return view('home.details.index',['goods'=>$goods,'goodsinfos'=>$goodsinfos,'countCar'=>$countCar,'speak'=>$speak,'gooddata'=>$gooddata,'friends'=>$friends]);
    }


}
