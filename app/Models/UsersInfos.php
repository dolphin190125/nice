<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersInfos extends Model
{
    //
    public $table = 'users_infos';

    // 配置 一对一关系 根据用户详情 查找用户
    public function users()
    {
    	return $this->belongsTo('App\Models\Users');
    }
}
