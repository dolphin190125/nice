
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
    
    <link rel="stylesheet" type="text/css" href="/ho/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/ho/css/MagicZoom.css" />
    <script type="text/javascript" src="/ho/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/ho/js/num.js">
    	var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/ho/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/ho/js/shade.js"></script>
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
@include('home.layout.header')
<div class="top">
    <div class="logo"><a href="/home/index"><img src="/ho/images/logo.png" /></a></div>
    <div class="search">
    	<form>
        	<input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
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
	<div class="postion">
    	<span class="fl">全部 > 美妆个护 > 香水 > 迪奥 > 迪奥真我香水</span>
    </div>    
    <div class="content">
    	                    
        <div id="tsShopContainer">
            <div id="tsImgS"><a href="/uploads/{{$goods->pic}}" title="Images" class="MagicZoom" id="MagicZoom"><img src="/uploads/{{$goods->pic}}" width="390" height="390" /></a></div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                        <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="/uploads/{{$goods->pic}}" tsImgS="/uploads/{{$goods->pic}}" width="79" height="79" /></li>
                        <li onclick="showPic(1)" rel="MagicZoom"><img src="/uploads/{{$goodsinfos->pic1}}" tsImgS="/uploads/{{$goodsinfos->pic1}}" width="79" height="79" /></li>
                        <li onclick="showPic(2)" rel="MagicZoom"><img src="/uploads/{{$goodsinfos->pic2}}" tsImgS="/uploads/{{$goodsinfos->pic2}}" width="79" height="79" /></li>
                        <li onclick="showPic(3)" rel="MagicZoom"><img src="/uploads/{{$goodsinfos->pic3}}" tsImgS="/uploads/{{$goodsinfos->pic3}}" width="79" height="79" /></li>
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="/ho/images/loading.gif" alt="Loading..." />				
        </div>
        
        <div class="pro_des">
        	<div class="des_name">
            	<p>{{$goods->title}}</p>
                {{$goodsinfos->desc}}
            </div>
            <div class="des_price">
            	本店价格：<b>￥{{$goods->price}}</b><br />
            </div>
            <div class="des_choice">
            	<span class="fl">型号选择：</span>
                <ul>
                	<li class="checked">{{$goodsinfos->capa}}<div class="ch_img"></div></li>
                </ul>
            </div>
            <div class="des_choice">
            	<span class="fl">属性选择：</span>
                <ul>
                    <li class="checked">{{$goodsinfos->taste}}<div class="ch_img"></div></li>
                </ul>
            </div>
            <div class="des_share">
            	<div class="d_sh">
                	分享
                    <div class="d_sh_bg">
                    	<a href="#"><img src="/ho/images/sh_1.gif" /></a>
                        <a href="#"><img src="/ho/images/sh_2.gif" /></a>
                        <a href="#"><img src="/ho/images/sh_3.gif" /></a>
                        <a href="#"><img src="/ho/images/sh_4.gif" /></a>
                        <a href="#"><img src="/ho/images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a onclick="ShowDiv('MyDiv','fade')">关注商品</a></div>
            </div>
            <div class="des_join">
                <form method="get" action="/home/car/add">
                    <div class="j_nums">
                        <input type="text" value="1" name="num" class="n_ipt" />
                        <input type="button" onclick="addUpdate(jq(this));" class="n_btn_1" />
                        <input type="button" onclick="jianUpdate(jq(this));" class="n_btn_2" />  
                        <input type="hidden" value="{{$goods->id}}" name="id"> 
                    </div>
                    <button  style="border:0px solid #eee;background:#fff"><span class="fl"><img src="/ho/images/j_car.png"></span></button>
                </form>
            </div>            
        </div>    
        


        
        
        
    </div>
    <div class="content mar_20">
    	<div class="l_history">
        	<div class="fav_t">用户还喜欢</div>
        	<ul>
                
                @foreach($gooddata as $k=>$v)
                @if($v->status == 4)
            	<li>
                    <div class="img"><a href="/home/details/{{ $v->id }}"><img src="/uploads/{{ $v->pic }}" width="185" height="162" /></a></div>
                	<div class="name"><a href="/home/details/{{ $v->id }}">{{ $v->title }}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $v->price }}.00</span></font> &nbsp;
                    </div>
                </li>
                @endif
               @endforeach
        	</ul>
        </div>
        <div class="l_list">        	
     
            <div class="des_border">
                <div class="des_tit">
                	<ul>
                    	<li class="current"><a href="#p_attribute">商品属性</a></li>
                        <li><a href="#p_details">商品详情</a></li>
                        <li><a href="#p_comment">商品评论</a></li>
                    </ul>
                </div>
                <div class="des_con" id="p_attribute">
                	
                	<table border="0" align="center" style="width:100%; font-family:'宋体'; margin:10px auto;" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>商品名称：{{$goods->title}}</td>
                        <td>品牌： {{ $goods->goodsbrands->bname }} </td>
                        <td>上架时间：{{ $goods->created_at }} </td>
                      </tr>
                    </table>   
                </div>
          	</div>  
            
            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                	<table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="265"><img src="/uploads/{{$goods->pic}}" width="200"/></td>
                        <td>
                        	<b>{{$goods->title}}</b><br />
                            【商品规格】：{{$goodsinfos->capa}}<br />
                            【商品日期】：{{$goods->created_at}}<br />
                            【商品香调】：{{$goodsinfos->taste}}<br />
                            【商品描述】：{{$goodsinfos->desc}}<br />
                        </td>
                      </tr>
                    </table>
                    
                    <p align="center">
                    <img src="/uploads/{{$goodsinfos->pic1}}" width="746" /><br /><br />
                    <img src="/uploads/{{$goodsinfos->pic2}}" width="750" /><br /><br />
                    <img src="/uploads/{{$goodsinfos->pic3}}" width="750" /><br /><br />
					</p>
                    
                </div>
          	</div>  
            
            <div class="des_border" id="p_comment">
            	<div class="des_t">商品评论</div>
		
                <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                @if(!empty($speak))
                @foreach($speak as $k=>$v)
                  <tr valign="top">
                    <td width="160"><img src="/uploads/{{$v->speaks_users->userinfo->profile}}" width="20" height="20" align="absmiddle" />&nbsp;{{$v->speaks_users->uname}}</td>
                    <td>
                        @if($v->start == 0)
                            ★
                        @elseif($v->start == 1)
                            ★★
                        @elseif($v->start == 2)
                            ★★★
                        @elseif($v->start == 3)
                            ★★★★
                        @elseif($v->start == 4)
                            ★★★★★
                        @endif
                    </td>
                    <td>
                       <img src="/uploads/{{$v->picture}}" style="width:50px;">
                    </td>
                    <td>
                    	{{$v->speak}} <br />
                        <font color="#999999">{{$v->created_at}}</font>
                    </td>
                  </tr>
                  @endforeach
                @endif
                </table>

                	
                    
               
                
          	</div>
            
            
        </div>
    </div>
    
    
    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/ho/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/ho/images/suc.png" /></td>
                    <td>
                    	<span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                    	<a href="#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                  	<td>&nbsp;</td>
                    <td><a href="#" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-收藏成功 End-->
    
    
    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/ho/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/ho/images/suc.png" /></td>
                    <td>
                    	<span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                    	购物车共有({{ $countCar }})件宝贝 &nbsp; &nbsp; 合计：1120元
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                  	<td>&nbsp;</td>
                    <td><a href="#" class="b_sure">去购物车结算</a><a href="#" class="b_buy">继续购物</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-加入购物车 End-->
    
    
    
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

<script src="/ho/js/ShopShow.js"></script>

<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
