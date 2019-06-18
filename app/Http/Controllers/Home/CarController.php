<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsinfos;
use App\Models\Cars;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->session()->flush();
        // dd(123);
        $id = $request->input('id','');
        $goods = Goods::where('id',$id)->first();
        $goodsinfos = Goodsinfos::where('goods_id',$id)->first();
        $num = $request->input('num','');
        $prices = $goods->price * $num;

        $car = Cars::find($id);
        if($car){
            $car->gname = $goods->title;
            $car->gtaste = $goodsinfos->taste;
            $car->num += $num;
            $car->prices += $prices;
            $car->gpic = $goods->pic;
            $res = $car->save();
        }else{
            $cars = new Cars;
            $cars->id = $id;
            $cars->gname = $goods->title;
            $cars->gtaste = $goodsinfos->taste;
            $cars->num = $num;
            $cars->prices = $prices;
            $cars->gpic = $goods->pic;
            $res = $cars->save();
        }
       
        echo "<script>alert('添加购物车成功');location.href='/home/details/$id'</script>";
        // return back();
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
        $cars_all = Cars::all();
        $jiage = 0;
        foreach($cars_all as $k=>$v){
            $jiage +=$v->prices;
        }
        return view('home.car.index',['cars_all'=>$cars_all,'jiage'=>$jiage]);
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
    public function destroy(Request $request, $id)
    {
        // 获取本条商品详情,删除掉
        $res1 = Cars::destroy($id);
        // 删除图片详情1
        if($request->hasFile('gpic')){
             Storage::delete($request->input('gpic'));
        }
        return back();
    }
}
