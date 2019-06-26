
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
    <script type="text/javascript" src="/ho/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/ho/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/ho/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/ho/js/menu.js"></script>    
        
	<script type="text/javascript" src="/ho/js/select.js"></script>
    
	<script type="text/javascript" src="/ho/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/ho/js/iban.js"></script>
    <script type="text/javascript" src="/ho/js/fban.js"></script>
    <script type="text/javascript" src="/ho/js/f_ban.js"></script>
    <script type="text/javascript" src="/ho/js/mban.js"></script>
    <script type="text/javascript" src="/ho/js/bban.js"></script>
    <script type="text/javascript" src="/ho/js/hban.js"></script>
    <script type="text/javascript" src="/ho/js/tban.js"></script>
    
	<script type="text/javascript" src="/ho/js/lrscroll_1.js"></script>
    
    
<title>Nice 首页</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
              <!-- 判断登录成功与否 -->
            
            @if(session('home_login'))
        	<span class="fl">你好，
                <a href="/home/login">{{ session('home_user')->uname }}</a>&nbsp; 
                <a href="/home/login/logout">退出</a>
               
                <a href="#">我的订单</a> &nbsp;|
                
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
           
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/ho/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="/home/index"><img src="/ho/images/logo.png"/></a></div>
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
            <div class="leftNav">
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
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End--> 
<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!--Begin Banner Begin-->
    	<div class="banner">    	
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    @foreach($banners_data as $k=>$v)
                    @if($v->status == 1)
                    <li><img src="/uploads/{{ $v->pic }}" width="740" height="401" /></li>
                    @endif
                    @endforeach
                </ul>	
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
        	<div class="news_t">
            	<span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
            	<li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
            	<li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
            	<li><span>[ 特惠 ]</span><a href="#">大牌闪购 · 抢！</a></li>
            	<li><span>[ 公告 ]</span><a href="#">发福利 买车就抢千元油卡</a></li>
            	<li><span>[ 公告 ]</span><a href="#">家电低至五折</a></li>
            </ul>
            <div class="charge_t">
            	话费充值<div class="ch_t_icon"></div>
            </div>
            <form>
            <table border="0" style="width:205px; margin-top:10px;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td width="33">号码</td>
                <td><input type="text" value="" class="c_ipt" /></td>
              </tr>
              <tr height="35">
                <td>面值</td>
                <td>
                	<select class="jj" name="city">
                      <option value="0" selected="selected">100元</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span style="color:#ff4e00; font-size:14px;">￥99.5</span>
                </td>
              </tr>
              <tr height="35">
                <td colspan="2"><input type="submit" value="立即充值" class="c_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
    <!--Begin 热门商品 Begin-->
    <div class="content mar_10">
    	<div class="h_l_img">
        	<div class="img"><img src="/ho/images/l_img.jpg" width="188" height="188" /></div>
            <div class="pri_bg">
                <span class="price fl">￥53.00</span>
                <span class="fr">16R</span>
            </div>
        </div> 
        <div class="hot_pro">        	
        	<div id="featureContainer">
                <div id="feature">
                    <div id="block">
                        <div id="botton-scroll">
                            <ul class="featureUL">
                                @foreach($goods as $k=>$v)
                                @if($v->status == '1')
                                <li class="featureBox">
                                    <div class="box">
                                    	<div class="h_icon">
                                            <img src="/ho/images/hot.png" width="50" height="50" />
                                        </div>
                                        <div class="imgbg">
                                        	<a href="#"><img src="/uploads/{{ $v->pic }}" width="160" height="136" /></a>
                                        </div>                                        
                                        <div class="name">
                                        	<a href="#">
                                            <h2>{{$v->title}}</h2>
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>{{$v->price}}</span></font>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a class="h_prev" href="javascript:void();">Previous</a>
                    <a class="h_next" href="javascript:void();">Next</a>
                </div>
            </div>
        </div>
    </div>
        <!--Begin 热卖 Begin-->
    <div class="i_t mar_10">
        <span class="floor_num">1F</span>
        <span class="fl">热门 <b>·</b> 热卖</span>                
        <span class="i_mores fr"><a href="#">进口咖啡</a>&nbsp; &nbsp; &nbsp; <a href="#">进口酒</a>&nbsp; &nbsp; &nbsp; <a href="#">进口母婴</a>&nbsp; &nbsp; &nbsp; <a href="#">新鲜蔬菜</a>&nbsp; &nbsp; &nbsp; <a href="#">新鲜水果</a></span>
    </div>
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        @foreach($banners_data as $k=>$v)
                        @if($v->type == 1)
                        <li><a href="#"><img src="/uploads/{{ $v->pic }}" width="211" height="286" /></a></li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="prevf">上一张</div>
                    <div class="nextf">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
                <div class="fresh_txt_c">
                    @foreach($tagdatas as $k=>$v)
                    @if($v->status == 1)
                    <a href="/home/list">{{ $v->tag_name }}</a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                @foreach($goods as $k=>$v)
                @if($v->status == '2')
                <li>
                    <div class="name"><a href="#">{{$v->title}}</a></div>
                    <div class="price">
                        <font>￥<span>{{$v->price}}.00</span></font>
                    </div>
                    <div class="img"><a href="#"><img src="/uploads/{{ $v->pic }}" width="185" height="155" /></a></div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/ho/images/fre_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/ho/images/fre_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 进口 生鲜 End-->
	
  

    <div class="content mar_20">
    	<img src="/ho/images/mban_1.jpg" width="1200" height="110" />
    </div>

    <!--Begin 数码家电 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">2F</span>
    	<span class="fl">数码家电</span>                                
        <span class="i_mores fr"><a href="#">手机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">苹果</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">华为手机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">洗衣机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">数码配件</a></span>                                               
    </div>
    <div class="content">
    	<div class="tel_left">
        	<div class="tel_ban">
            	<div id="imgPlay6">
                    <ul class="imgs" id="actor6">
                        @foreach($banners_data as $k=>$v)
                        @if($v->type == 2)
                        <li><a href="#"><img src="/uploads/{{ $v->pic }}" width="211" height="286" /></a></li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="prev_t">上一张</div>
                    <div class="next_t">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                    @foreach($tagdatas as $k=>$v)
                    @if($v->status == 2)
                	<a href="#">{{ $v->tag_name }}</a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                @foreach($goods as $k=>$v)
                @if($v->status == '4')
            	<li>
                	<div class="name"><a href="#">{{$v->title}}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $v->price }}.00</span></font> &nbsp;
                    </div>
                    <div class="img"><a href="#"><img src="/uploads/{{ $v->pic }}" width="185" height="155" /></a></div>
                </li>
               @endif
               @endforeach
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="/ho/images/tel_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/ho/images/tel_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 数码家电 End-->
    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
    	<span class="fl">猜你喜欢</span>
    </div>    
    <div class="like">        	
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            @foreach($goods as $k=>$v)
                            @if($v->status == '3')
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/uploads/{{ $v->pic }}" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        
                                        {{$v->title}}
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>{{$v->price}}.00</span></font> &nbsp; 
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->
    
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
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
