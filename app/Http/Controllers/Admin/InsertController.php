<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
class InsertController extends Controller
{
    //
    public function add()
    {
    	$data = ['uname'=>'jingli','upass'=>Hash::make('111111')];
    	$res = DB::table('admin_users')->insert($data);
    	dump($res);
    }
}
