@extends('home.layout.index')


@section('content')

 <div class="m_des">
 	  <div class="mem_t" style="font-size: 28px; color: #808a87">编 辑 用 户 信 息</div>
 	  <br>
    <form action="/home/usersinfo/update/{{ $user_data->id }}" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
	    <table border="0" style="width:880px; font-size: 13px;"  cellspacing="0" cellpadding="0">
	      <tr height="45">
	        <td width="80" align="right">用 户 名: &nbsp; &nbsp;</td>
	        <td><input type="text" value="{{ $user_data->uname }}" name="uname" class="add_ipt" style="width:380px;" />&nbsp;</td>
	      </tr>
	      <tr height="45">
	      	<input type="hidden" name="old_profile" value="">
	        <td align="right">头 &nbsp; &nbsp; 像: &nbsp; &nbsp;</td>
	        <td><input type="file" value="" name="profile" class="add_ipt" style="width:380px;" />&nbsp;</td>
	      </tr>
	      <tr height="45">
	        <td align="right">性 &nbsp; &nbsp; 别: &nbsp; &nbsp;</td>
	        @if(!empty($user_data->userinfo->sex))
		        @if($user_data->userinfo->sex == 0)
		        <td><input type="radio"  name="sex" value="0" checked>&nbsp;女
					<input type="radio" name="sex" value="1">&nbsp;男
					<input type="radio" name="sex" value="2">&nbsp;保密
		        </td>
		        @elseif($user_data->userinfo->sex == 1)
		        <td><input type="radio"  name="sex" value="0">&nbsp;女
					<input type="radio" name="sex" value="1" checked>&nbsp;男
					<input type="radio" name="sex" value="2">&nbsp;保密
		        </td>
		        @else
		        <td><input type="radio"  name="sex" value="0">&nbsp;女
					<input type="radio" name="sex" value="1">&nbsp;男
					<input type="radio" name="sex" value="2" checked>&nbsp;保密
		        </td>
		        @endif
		    @else
		     	<td><input type="radio"  name="sex" value="0">&nbsp;女
					<input type="radio" name="sex" value="1">&nbsp;男
					<input type="radio" name="sex" value="2">&nbsp;保密
		        </td>
		    @endif
	      </tr>
	      <tr height="45">
	        <td align="right">年 &nbsp; &nbsp; 龄: &nbsp; &nbsp;</td>
	        @if(!empty($user_data->userinfo->age))
	        <td><input type="text" value="{{ $user_data->userinfo->age }}" name="age" class="add_ipt" style="width:380px;" />&nbsp;</td>
	        @else
			<td><input type="text" value="" name="age" class="add_ipt" style="width:380px;" />&nbsp;</td>
			@endif
	      </tr>
	      <tr height="45">
	        <td align="right">电 &nbsp; &nbsp; 话: &nbsp; &nbsp;</td>
	        <td><input type="text" value="{{ $user_data->phone }}" name="phone" class="add_ipt" style="width:380px;" />&nbsp;</td>
	      </tr>
	      <tr height="45">
	        <td align="right">邮 &nbsp; &nbsp; 箱: &nbsp; &nbsp;</td>
	        <td><input type="text" value="{{ $user_data->email }}" name="email" class="add_ipt" style="width:380px;" />&nbsp;</td>
	      </tr>
	      <tr height="45">
	        <td align="right">籍 &nbsp; &nbsp; 贯: &nbsp; &nbsp;</td>
	         @if(!empty($user_data->userinfo->addr))
	        <td><input type="text" value="{{ $user_data->userinfo->addr }}" class="add_ipt" name="addr" style="width:380px;" />&nbsp;</td>
	         @else
			<td><input type="text" value="" name="addr" class="add_ipt" style="width:380px;" />&nbsp;</td>
			@endif
	      </tr>
	     
	      <tr height="50">
	        <td>&nbsp;</td>
	        <td><input type="submit" value="确认修改" class="btn_tj" /></td>
	      </tr>
	    </table>
    </form>
</div>

@endsection