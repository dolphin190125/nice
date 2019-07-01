
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/ho/css/style.css" />
    <!--[if IE 6]>
    <script src="/ho/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
    
    <script type="text/javascript" src="/ho/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/ho/js/menu.js"></script>    
            
	<script type="text/javascript" src="/ho/js/lrscroll_1.js"></script>
    
    
	<script type="text/javascript" src="/ho/js/n_nav.js"></script>
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
@include('home.layout.header')
<div class="top">
    <div class="logo"><a href="/home/index"><img src="/ho/images/logo.png" /></a></div>
    <div class="search">
    	<form action="/home/list" method="get">
            <input type="text" value="" name="search" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>
    </div>
    <div class="i_car">
    	<div class="car_t"><a href="/home/car/index">购物车({{ $countCar }})</a></div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin-->    
    	<div class="nav">
        	<div class="nav_t">全部商品分类</div>
            <div class="leftNav none">
                <ul>      
                    @foreach($common_cates_data as $k=>$v)   
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/ho/images/nav1.png" /></span>
                            <span class="fl">{{$v->cates_name}}</span>
                        </div>
                        <div class="zj">
                            <div class="zj_l">
                                @foreach($v->sub as $kk=>$vv)
                                <div class="zj_l_c">
                                    <h2>{{$vv->cates_name}}</h2>
                                    @foreach($vv->sub as $kkk=>$vvv)
                                    <a href="/home/list?id={{ $vvv->id}}">{{$vvv->cates_name}}</a>|
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/ho/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/ho/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>  
                    @endforeach                         	
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
    	<ul class="menu_r">                                                                                                                                               
        	<li><a href="Index.html">首页</a></li>
            <li><a href="Food.html">美食</a></li>
            <li><a href="Fresh.html">生鲜</a></li>
            <li><a href="HomeDecoration.html">家居</a></li>
            <li><a href="SuitDress.html">女装</a></li>
            <li><a href="MakeUp.html">美妆</a></li>
            <li><a href="Digital.html">数码</a></li>
            <li><a href="GroupBuying.html">团购</a></li>
        </ul>
       
    </div>
</div>
<!--End Menu End--> 
<div class="i_bg">

    <!--Begin 筛选条件 Begin-->
    <div class="content mar_10">
        <table border="0" class="choice" style="width:100%; font-family:'宋体'; margin:0 auto;" cellspacing="0" cellpadding="0">
            <tr valign="top">
                <td width="70">&nbsp; 品牌：</td>
                <td class="td_a">
                    @foreach($brands as $k=>$v)
                    @if($v->status == 1)
                        @if($v->cates_id == $id)
                        <img src="/uploads/{{$v->img}}" title="{{$v->bname}}" style="width:40px;height:40px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif
                    @endif
                    @endforeach
                </td>
            </tr>                                               
        </table>                                                                                 
    </div>

    <div class="content mar_20">
    	<div class="l_history">
        	<div class="his_t">
            	<span class="fl">类似商品</span>
            </div>
        	<ul>
                @foreach($pgood as $kkk=>$vvv)
            	<li>
                    <div class="img"><a href="/home/details/{{$vvv->id}}"><img src="/uploads/{{$vvv->pic}}" width="185" height="162" /></a></div>
                	<div class="name"><a href="/home/details/{{$vvv->id}}">{{$vvv->title}}</a></div>
                    <div class="price">
                    	<font>￥<span>{{$vvv->price}}.00</span></font>
                    </div>
                </li>
                @endforeach
        	</ul>
        </div>
        <div class="l_list">
            <div class="list_c">
                <ul class="cate_list">
                    @foreach($goods as $k=>$v)
                	<li>
                    	<div class="img"><a href="/home/details/{{$v->id}}"><img src="/uploads/{{$v->pic}}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$v->price}}.00</span></font>
                        </div>
                        <div class="name"><a href="/home/details/{{$v->id}}">{{$v->title}}</a></div>
                        <div class="carbg">
                        	<font><span>销量  </span></font>
                            <font><span>{{$v->sale}} </span></font>
                            &nbsp;&nbsp;&nbsp;
                            <font><span> 好评率  </span></font>
                            <font><span>100%</span></font>
                        </div>
                    </li>
                    @endforeach
                </ul>  
            </div>
        </div>
    </div>
    <!--Begin Footer Begin -->
    <div class="b_btm_bg bg_color">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/ho/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/ho/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/ho/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/ho/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/ho/images/er.gif" width="118" height="118" /></div>
            <img src="/ho/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/ho/images/b_1.gif" width="98" height="33" /><img src="/ho/images/b_2.gif" width="98" height="33" /><img src="/ho/images/b_3.gif" width="98" height="33" /><img src="/ho/images/b_4.gif" width="98" height="33" /><img src="/ho/images/b_5.gif" width="98" height="33" /><img src="/ho/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>

</body>

</html>
