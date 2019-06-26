<div class="soubg">
	<div class="sou">
    <span class="fr">
    	   <!-- 判断登录成功与否 -->
      @if(session('home_login'))
        <span class="fl">你好，
          <a href="/home/login">{{ session('home_user')->uname }}</a>&nbsp; 
          <a href="/home/login/logout">退出</a>
            &nbsp;|&nbsp;
          <a href="/home/order/myorder">我的订单</a> &nbsp;|
        </span>
      @else
        <span class="fl">你好，请
          <a href="/home/login">登录</a>&nbsp; 
            
          <a href="/home/register" style="color:#ff4e00;">免费注册</a>
        </span>
      @endif
      @if(session('home_login'))
        <span class="ss">
          <div class="">
            <a href="/home/usersinfo/{{ session('home_user')->id }}"> &nbsp;个人中心</a>
          </div>
        </span>
      @endif
        <span class="fl">&nbsp;<a href="/home/index">首页 |</a></span>
        <span class="fl">&nbsp;关注我们：</span>
        <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
        <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/ho/images/s_tel.png" align="absmiddle" /></a></span>
    </span>
  </div>
</div>