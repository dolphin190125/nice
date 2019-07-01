
@extends('home.layout.index')

@section('content')

<div class="">
  <p></p>
    <div class="mem_tit">账户安全</div>
    <div class="m_des">
        <form action="/home/address/doaddress/{{ $address_user->id }}" method="post">
           {{ csrf_field() }}
            <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
              <tr height="45">
                <td width="80" align="right">收货人姓名 &nbsp; &nbsp;</td>
                <td><input type="text" name="name" value="{{ $address_user->name }}" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>

               <tr height="45">
                <td align="right">联系方式 &nbsp; &nbsp;</td>
                <td><input type="text"  name="phone" value="{{ $address_user->phone }}" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>

              <tr height="45">
                <td align="right">收货人地址 &nbsp; &nbsp;</td>
                <td><input type="text" name="address" value="{{ $address_user->address }}" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
             
              <tr height="50">
                <td>&nbsp;</td>
                <td><input type="submit" value="确认修改" class="btn_tj" /></td>
              </tr>
            </table>
        </form>
    </div>
</div>


@endsection