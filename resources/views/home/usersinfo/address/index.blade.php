@extends('home.layout.index')


@section('content')
  <div class="mem_tit">我的收货地址</div>
  <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>                                             
        <td width="50px">收货人姓名</td>
        <td width="100px">联系方式</td>
        <td width="100px">收货地址</td>
        <td width="100px">操作</td>
      </tr>
     @foreach($addresses_data as $k=>$v)
      <tr>
        <td>{{ $v->name }}</td>
        <td>{{ $v->phone }}</td>
        <td>{{ $v->address }}</td>
        <td>
          <a href="/home/address/address/{{ $v->id }}">修改地址</a>
          <a href="/home/address/destroy/{{ $v->id }}">删除</a>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
@endsection
