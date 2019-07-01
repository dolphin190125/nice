<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\FriendsLinks;
class AddressController extends Controller
{
    //
    // 查看收货地址
    public function selectaddress($id)
    {
        // 通过用户id 得到用户的所有收货地址 
        $addresses_data = Addresses::where('users_id',$id)->get();
        $friends = FriendsLinks::where('status',1)->get();
        // 加载收货地址页面 将查询到的用户所有收货地址分配到页面中
        return view('home.usersinfo.address.index',['addresses_data'=>$addresses_data,'friends'=>$friends]);
    }

    // 显示修改收货地址页面
    public function address($id)
    {
        // 通过收货地址id 查询到需要修改的一条数据
        $address_user = Addresses::where('id',$id)->first();
        $friends = FriendsLinks::where('status',1)->get();
        // 加载修改收货地址页面 将数据分配到页面中
        return view('home.usersinfo.address.edit',['address_user'=>$address_user,'friends'=>$friends]);
    }
    // 处理修改操作
    public function doaddress(Request $request,$id)
    {
      // 找到需要修改的数据
        $address = Addresses::find($id);
      
       // 修改数据
       $address->name = $request->input('name','');
       $address->phone = $request->input('phone','');
       $address->address = $request->input('address','');

       // 将修改后的数据压入数据库
       $res = $address->save();
        $uid = session('home_user')->id;
       if($res){
           return redirect("/home/address/selectaddress/{$uid}");
        }else{
            echo "<script>alert('修改失败');location.href='/home/address/doaddress/{$id}'</script>";
            exit;
        }
    }

    // 删除地址
    public function destroy($id)
    {
      // 执行删除操作 根据传的收货地址id值
        $res = Addresses::destroy($id);
        if($res){
           
           return redirect("/home/address/selectaddress/{$uid}");
        }else{
            echo "<script>alert('删除失败');location.href='/home/address/destroy/{$id}'</script>";
            exit;
        }
    }
}
