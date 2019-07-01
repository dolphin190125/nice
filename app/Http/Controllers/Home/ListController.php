<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Brands;
use App\Models\Goodsinfos;
use App\Models\FriendsLinks;
use DB;
use App\Http\Controllers\Home\CarController;
class ListController extends Controller
{
    // 一实例化自动加载,引入中文分词的文件
    public function __construct()
    {
        // 引入类文件
        require './pscws4/pscws4.class.php';
        // 实例化
        @$this->cws = new \PSCWS4;
        //设置字符集
        $this->cws->set_charset('utf8');
        //设置词典
        $this->cws->set_dict('pscws4/etc/dict.utf8.xdb');
        //设置utf8规则
        $this->cws->set_rule('pscws4/etc/rules.utf8.ini');
        //忽略标点符号
        $this->cws->set_ignore(true);
    }
    // 一旦调用,直接把goods商品表里面的数据,自动分好词,都添加进goods_words表里
    public function dataWord()
    {
        // 先拿到商品表里的所有数据,字段只有商品题目和商品id
        $data = DB::table('goods')->select('title','id')->get();
        // 通过遍历,分好词,然后逐个词添加进表里
        foreach($data as $key =>$value){
            $arr = $this->word($value->title);
            foreach($arr as $kk => $vv){
                DB::table('goods_words')->insert(['goods_id'=>$value->id,'word'=>$vv]);
            }
            
        }
    }
    // 加载列表页
    public function index(Request $request)
    {
        // 第一次加载时,先分词
        // $this->dataWord();
        // 拿到购物车里面的商品数量
        $countCar = CarController::countCar();
        // 拿到搜索的数据,如果没有拿到空
        $search = $request->input('search','');
        // 拿到传过来的分类id
        $id = $request->input('id','');
        if(!empty($search)){
            // 如果搜索不是空的,就把搜索到的商品,放到goods里面
            if(preg_match('/[\w]/',$search)){
                $goods = DB::table('goods')->where('title','like','%'.$search.'%')->get();
                $pgood = DB::table('goods')->where('title','like','%'.$search.'%')->orderBy('sale','asc')->paginate(4);
            }else{
                // 把视图里面的goods_id拿出来,通过搜索
                $gid = DB::table('view_goods_words')->select('goods_id')->where('word',$search)->get();
                // 声明一个空数组
                $gids = [];
                foreach ($gid as $key => $value) {
                    // 这个数组来存放所有的goods_id
                    $gids[] = $value->goods_id;
                }
                // 通过gids来找到相关的所有商品
                $goods = DB::table('goods')->whereIn('id',$gids)->get();
                $pgood = DB::table('goods')->whereIn('id',$gids)->orderBy('sale','asc')->paginate(4);
            }
        }else{
            // 如果搜索是空的,那就通过传来的分类id,搜索相关商品
            if(!empty($id)){
                $goods = Goods::where('cates_id',$id)->get();
                $pgood = Goods::where('cates_id',$id)->orderBy('sale','asc')->paginate(4);
            }
        }
        // 获取所有的轮播图
        $brands = Brands::all();
        $friends = FriendsLinks::where('status',1)->get();
        return view('home.list.index',['brands'=>$brands,'goods'=>$goods,'countCar'=>$countCar,'pgood'=>$pgood,'id'=>$id,'friends'=>$friends]);
    }

    public function word($text)
    {
        $arr = explode(' ',$text);
        $preg = '/[\w\+\%\.\(\)]+/';
        $string = '';
        // 拼接字符串
        foreach($arr as $key => $value) {
            $string .= preg_replace($preg,'',$value);
        }
        // 传递字符串
        $this->cws->send_text($string);
        // 获取权重最高的前十个词
        // $res = $cws->get_tops(10);// top 顶部

        // 获取所有的结果
        $res = $this->cws->get_result();
        $list = [];
        foreach($res as $key =>$value){
            $list[] = $value['word'];
        }
        return $list;
    }
    public function __destruct()
    {
        //关闭
        $this->cws->close();
    }
}
