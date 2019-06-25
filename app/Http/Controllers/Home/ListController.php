<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Brands;
use App\Models\Goodsinfos;
use DB;
use App\Http\Controllers\Home\CarController;
class ListController extends Controller
{
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

    public function dataWord()
    {
        $data = DB::table('goods')->select('title','id')->get();
        // dd($data);
        foreach($data as $key =>$value){
            $arr = $this->word($value->title);
            foreach($arr as $kk => $vv){
                DB::table('goods_words')->insert(['goods_id'=>$value->id,'word'=>$vv]);
            }
            
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->dataWord();
        $countCar = CarController::countCar();
        $search = $request->input('search','');
        $id = $request->input('id','');
        if(!empty($search)){
            if(preg_match('/[\w]/',$search)){
                // dump(preg_match('/[\w]/',$search));
                $goods = DB::table('goods')->where('title','like','%'.$search.'%')->get();
            }else{
                $gid = DB::table('view_goods_words')->select('goods_id')->where('word',$search)->get();
                // dump($gid);
                $gids = [];
                foreach ($gid as $key => $value) {
                    $gids[] = $value->goods_id;
                }
                // dump($gids);
                // dump($data2);
                $goods = DB::table('goods')->whereIn('id',$gids)->get();
            }
        }else{
            if(!empty($id)){
                $goods = Goods::where('cates_id',$id)->get();
            }
        }
        
        $brands = Brands::all();
        return view('home.list.index',['brands'=>$brands,'goods'=>$goods,'countCar'=>$countCar]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function word($text)
    {
        $arr = explode(' ',$text);
        $preg = '/[\w\+\%\.\(\)]+/';
        $string = '';
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function __destruct()
    {
        //关闭
        $this->cws->close();
    }
}
