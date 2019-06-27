
@extends('home.layout.index')

@section('content')

<div class="">
  <p></p>
    <div class="mem_tit">账户安全</div>
    <div class="m_des">
        <form action="/home/safe/changePass/{{ session('home_user')->id }}" method="post">
           {{ csrf_field() }}
            <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
              <tr height="45">
                <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
                <td><input type="password" value="" name="upass" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td align="right">新密码 &nbsp; &nbsp;</td>
                <td><input type="password" value="" name="newpass" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td align="right">确认密码 &nbsp; &nbsp;</td>
                <td><input type="password" value="" name="repass" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
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