<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Banners;
use App\Models\Tagnames;
use App\Http\Controllers\Home\CarController;
class IndexController extends Controller
{
    // 获得三级分类
    public static function getPidCatesData($pid = 0)
    {
        // 第一次调用,找到一级标题,第二次调用找到二级标题,第三次调用找到三级标题
        $data = Cates::where('pid',$pid)->get();
        foreach($data as $k=>$v){
            $v->sub = self::getPidCatesData($v->id);
        }
        // 返回这个数组
        return $data;
    }

    // 加载首页
    public function index()
    {
        // 获取购物车里面有多少商品
        $countCar = CarController::countCar();
        // 商品
        $goods=Goods::all();
        // 获取轮播图所有数据
        $banners_data = Banners::all();
        // 获取标签云所有数据
        $tagdatas = Tagnames::all();
        // 加载模板
        return view('home.index.index',['banners_data'=>$banners_data,'goods'=>$goods,'countCar'=>$countCar,'tagdatas'=>$tagdatas]);
    }
}
