@extends('home.layout.index')


@section('content')
  <div class="mem_tit">我的评价</div>
  <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>                                             
        <td width="50px">商品图片</td>
        <td width="100px">商品名称</td>
        <td width="100px">文字评论</td>
        <td width="100px">星级评价</td>
        <td width="100px">图片凭证</td>
        <td width="100px">操作</td>
      </tr>
      @foreach($speaks as $k=>$v)
        <tr>
          <td><img src="/uploads/{{$v->speaks_goods->pic}}" style="width:50px"></td>
          <td><font color="#ff4e00">{{$v->speaks_goods->title}}</font></td>
          <td>{{$v->speak}}</td>
          <td>
            @if($v->start ==0)
              ★
            @elseif($v->start ==1)
              ★★
            @elseif($v->start ==2)
              ★★★
            @elseif($v->start ==3)
              ★★★★
            @elseif($v->start ==4)
              ★★★★★
            @endif
          </td>
          <td><img src="/uploads/{{$v->picture}}" style="width:50px"></td>
          <td>
              <!-- <button style="border:1px solid #f2b666; background:tomato;width:70px;height:30px;">修改评论</button> -->
              <a href="/home/speak/delete?id={{$v->id}}"><button style="border:1px solid #fa8072; background:#fa8072;width:70px;height:30px;">删除评论</button></a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
