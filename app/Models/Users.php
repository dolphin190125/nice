<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 配置表名
    public $table = 'users';

    // 配置 一对一 根据用户表  找 用户详情表
    public function userinfo()
    {
    	return $this->hasOne('App\Models\UsersInfos','users_id');
    }
}
