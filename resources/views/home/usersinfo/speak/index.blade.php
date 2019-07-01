@extends('home.layout.index')


@section('content')
  <div class="mem_tit">我的评论</div>
  <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>                                             
        <td width="50px">评论人</td>
        <td width="100px">评论商品图片</td>
        <td width="100px">评论内容</td>
        <td width="100px">操作</td>
      </tr>
     @foreach($speaks_data as $k=>$v)
      <tr>
        <td width="50px">{{ $v->speaks_users->uname }}</td>
        <td width="100px">
          <img src="/uploads/{{ $v->speaks_goods->pic }}" style="width: 100px;height: 70px">
        </td>
        <td width="100px">{{ $v->speak }}</td>
        <td width="100px">
          <a href="/home/speaks/delete/{{ $v->id }}">删除</a>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
@endsection
