<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    // 设置表名
    public $table="goods";
    // 配置 一对一 根据商品找商品详情
    public function goodsinfos()
    {
    	return $this->hasOne('App\Models\GoodsInfos','goods_id');
    }
    // 配置 根据商品找商品品牌
     public function goodsbrands()
    {
    	return $this->belongsTo('App\Models\Brands','brands_id');
    }
}
