
@extends('home.layout.index')

@section('content')
<br>
<br>
    <div class="mem_t" style="font-size: 28px; color: #808a87">用 户 信 息</div>

    <br>
    <br>
        <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px; font-size: 13px" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40%">用 户 名：<span style="color:#555555;">{{ $user_data->uname }}</span></td>
          </tr>
          <tr>

            <td>头&nbsp; &nbsp; 像：</td>
            <td>
              @if(empty($user_data->userinfo->profile))
               <span style="color:#555555;">
                <img src="/ho/images/tou.jpg" style="width: 50px;height:auto;margin-left: -450px">
              </span>
              @else
              <span style="color:#555555;">
                <img src="/uploads/{{ $user_data->userinfo->profile }}" style="width: 50px;height:auto;margin-left: -450px">
              </span>
              @endif
            </td>
          </tr>
          <tr>
            @if(!empty($user_data->userinfo->sex))
                @if($user_data->userinfo->sex == 0)
                  <td width="40%">性&nbsp; &nbsp; 别:  &nbsp; <span style="color:#555555;">女</span></td>
                @elseif($user_data->userinfo->sex == 1)
                  <td width="40%">性&nbsp; &nbsp; 别:  &nbsp; <span style="color:#555555;">男</span></td>
                @else
                  <td width="40%">性&nbsp; &nbsp; 别:  &nbsp; <span style="color:#555555;">保密</span></td>
                @endif
            @else
                <td width="40%">性&nbsp; &nbsp; 别:  &nbsp; <span style="color:#555555;"></span></td>
            @endif   
          </tr>
           <tr>
            @if(!empty($user_data->userinfo->age))
            <td width="60%">年&nbsp; &nbsp; 龄：<span style="color:#555555;">{{ $user_data->userinfo->age }}</span></td>
            @else
            <td width="60%">年&nbsp; &nbsp; 龄：<span style="color:#555555;"></span></td>
            @endif
          </tr>
          <tr>
            <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{ $user_data->phone }}</span></td>
          </tr>
          <tr>
            
            <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{ $user_data->email }}</span></td>
          </tr>
          <tr>
            @if(!empty($user_data->userinfo->addr))
             <td>籍&nbsp; &nbsp; 贯:  &nbsp; <span style="color:#555555;">{{ $user_data->userinfo->addr }}</span></td>
            @else
            <td>籍&nbsp; &nbsp; 贯:  &nbsp; <span style="color:#555555;"></span></td>
            @endif
          </tr>
          <tr>
           
            <td>注 册 时 间：<span style="color:#555555;">{{ $user_data->created_at }}</span></td>
          </tr>
          
        </table>
       
        <form action="/home/usersinfo/edit/{{ $user_data->id }}" method="post" style="margin-left: 800px;">
            {{ csrf_field() }}
            <input type="submit" value="编辑资料" class="btn_tj" />
            
        </form>
@endsection