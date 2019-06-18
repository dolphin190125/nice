<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FriendsLinks;
class FriendsLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接受 搜索数据
        $search_fname = $request->input('search_fname','');
        $friends = FriendsLinks::where('fname','like','%'.$search_fname.'%')->paginate(3);
        // 显示 友情链接 列表页面
        return view('admin.friends.index',['friends'=>$friends,'search_fname'=>$search_fname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加 链接 页面
        
        return view('admin.friends.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 处理 添加 操作
       
        $this->validate($request, [
            'fname' => 'required|max:128',
            'url' => 'required|max:128',
            'person' => 'required',
            'phone' => 'required|regex:/^[\d]{11}$/',
            
        ],[
            'fname.required' => '友情链接名称必填',
            'fname.max' => '名称过长',
            'url.required' => '友情链接网址必填',
            'url.max' => '网址过长',
            'person.required' => '负责人必填',
            'phone.required' => '链接联系电话必填',
            'phone.regex' => '联系电话格式错误',
        ]);

        $data = $request->all();
        
       $friend = new FriendsLinks; 
       $friend->fname = $data['fname'];
       $friend->url = $data['url'];
       $friend->person = $data['person'];
       $friend->phone = $data['phone'];
       $res = $friend->save();
        if($res){
            return redirect('/admin/friendlinks')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
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

       $friends = FriendsLinks::find($id);

        // 显示 修改页面
        return view('admin.friends.edit',['friends'=>$friends]);
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
        // 处理 修改 操作
        // 验证数据
       $this->validate($request, [
            'fname' => 'required|max:128',
            'url' => 'required|max:128',
            'person' => 'required',
            'phone' => 'required|regex:/^[\d]{11}$/',
            
        ],[
            'fname.required' => '友情链接名称必填',
            'fname.max' => '名称过长',
            'url.required' => '友情链接网址必填',
            'url.max' => '网址过长',
            'person.required' => '负责人必填',
            'phone.required' => '链接联系电话必填',
            'phone.regex' => '联系电话格式错误',
        ]);

       $friends = FriendsLinks::find($id);
       // 修改数据
       $friends->fname = $request->input('fname','');
       $friends->url = $request->input('url','');
       $friends->person = $request->input('person','');
       $friends->phone = $request->input('phone','');
       $friends->status = $request->input('status',0);
       // 将修改后的数据压入数据库
       $res = $friends->save();

       if($res){
            return redirect('/admin/friendlinks')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除数据
        $res = FriendsLinks::destroy($id);

        if($res){
            return redirect('/admin/friendlinks')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
