<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    // 设置表名
    public $table="goods";
    // 配置 一对一 根据用户表  找 用户详情表
    public function goodsinfos()
    {
    	return $this->hasOne('App\Models\GoodsInfos','goods_id');
    }
}
