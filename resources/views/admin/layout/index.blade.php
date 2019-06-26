<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Nice 后台</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="/ad/css/bootstrap.min.css" rel="stylesheet">
	<link href="/ad/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="/ad/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="/ad/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/ad/img/favicon.ico">
	<!-- end: Favicon -->
	@section('css')

	@show
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>N i c e</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
					
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<img src="/uploads/{{ session('admin_user')->profile }}" style="width: 30px;height:30px"> {{ session('admin_user')->uname}}
							</a>
							<ul class="dropdown-menu">
								<li><a href="/admin/changeprofile/{{ session('admin_user')->id }}"><i class="halflings-icon user"></i>修改头像</a></li>
								<li><a href="/admin/changepass/{{ session('admin_user')->id }}"><i class="halflings-icon user"></i>修改密码</a></li>
								<li><a href="/admin/logout"><i class="halflings-icon off"></i> 退出</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header --><div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<!-- -------------------------用 户 管 理 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">用户管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/users"><i class="icon-file-alt"></i><span class="hidden-tablet"> 用户列表</span></a></li>
								<li><a class="submenu" href="/admin/users/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加用户</span></a></li>
								
							</ul>	
						</li>
						<!-- -------------------------品 牌 管 理 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">品牌管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/brands"><i class="icon-file-alt"></i><span class="hidden-tablet"> 品牌列表</span></a></li>
								<li><a class="submenu" href="/admin/brands/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加品牌</span></a></li>
								
							</ul>	
						</li>
						<!-- -------------------------轮 播 图 管 理 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">轮播图管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/banners"><i class="icon-file-alt"></i><span class="hidden-tablet"> 轮播图列表</span></a></li>
								<li><a class="submenu" href="/admin/banners/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加轮播图</span></a></li>
								
							</ul>	
						</li>
						<!-- -------------------------分 类 管 理 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">分类管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/cates"><i class="icon-file-alt"></i><span class="hidden-tablet"> 分类列表</span></a></li>
								<li><a class="submenu" href="/admin/cates/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加分类</span></a></li>
								
							</ul>	
						</li>

						<!-- -------------------------商 品 管 理 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">商品管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/goods"><i class="icon-file-alt"></i><span class="hidden-tablet"> 商品列表</span></a></li>
								<li><a class="submenu" href="/admin/goods/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加商品</span></a></li>
							</ul>
						</li>
						<!-- -------------------------友 情 链 接 管 理 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">友情链接管理</span></a>
							<ul>
								<li><a class="submenu" href="/admin/friendlinks"><i class="icon-file-alt"></i><span class="hidden-tablet"> 友情链接列表</span></a></li>
								<li><a class="submenu" href="/admin/friendlinks/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加友情链接</span></a></li>

								
							</ul>	
						</li>
						<!-- ------------------------- 管 理 员 ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">管理员</span></a>
							<ul>
								<li><a class="submenu" href="/admin/adminusers"><i class="icon-file-alt"></i><span class="hidden-tablet"> 管理员列表</span></a></li>
								<li><a class="submenu" href="/admin/adminusers/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加管理员</span></a></li>

								
							</ul>	
						</li>
						<!-- ------------------------- 角 色 管 理  ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">角色管理 </span></a>
							<ul>
								<li><a class="submenu" href="/admin/roles"><i class="icon-file-alt"></i><span class="hidden-tablet"> 角色列表</span></a></li>
								<li><a class="submenu" href="/admin/roles/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加角色</span></a></li>

								
							</ul>	
						</li>
						<!-- ------------------------- 权 限 管 理  ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">权限管理 </span></a>
							<ul>
								<li><a class="submenu" href="/admin/nodes"><i class="icon-file-alt"></i><span class="hidden-tablet"> 权限列表</span></a></li>
								<li><a class="submenu" href="/admin/nodes/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加权限</span></a></li>

								
							</ul>	
						</li>

						<!-- ------------------------- 订 单 管 理  ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">订单管理 </span></a>
							<ul>
								<li><a class="submenu" href="/admin/ordermanage/index"><i class="icon-file-alt"></i><span class="hidden-tablet"> 订单列表</span></a></li>
							</ul>	
						</li>
						<!-- ------------------------- 评 论 管 理  ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">评论管理 </span></a>
							<ul>
								<li><a class="submenu" href="/admin/speak/index"><i class="icon-file-alt"></i><span class="hidden-tablet"> 评论列表</span></a></li>

						<!-- ------------------------- 标 签 云 管 理  ------------------------------------>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">标签云管理 </span></a>
							<ul>
								<li><a class="submenu" href="/admin/tagnames"><i class="icon-file-alt"></i><span class="hidden-tablet"> 标签云列表</span></a></li>
								<li><a class="submenu" href="/admin/tagnames/create"><i class="icon-file-alt"></i><span class="hidden-tablet"> 添加标签云</span></a></li>

								

							</ul>	
						</li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			<!-- 内容  开始 -->
			<div id="content" class="span10">

				 <!-- 读取提示消息 -->
                @if(session('error'))
                 <div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
						{{ session('error')}}
				</div>
                 @endif       
                
			
                @if(session('success'))
                 <div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ session('success') }}
				</div>

                 @endif  

				@section('content')

				@show
			</div>
		</div><!--/.fluid-container-->
	
			<!-- 内容结束 -->
		</div><!--/#content.span10-->
		<!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="#">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<!-- start: JavaScript-->

		<script src="/ad/js/jquery-1.9.1.min.js"></script>
	<script src="/ad/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="/ad/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="/ad/js/jquery.ui.touch-punch.js"></script>
	
		<script src="/ad/js/modernizr.js"></script>
	
		<script src="/ad/js/bootstrap.min.js"></script>
	
		<script src="/ad/js/jquery.cookie.js"></script>
	
		<script src='/ad/js/fullcalendar.min.js'></script>
	
		<script src='/ad/js/jquery.dataTables.min.js'></script>

		<script src="/ad/js/excanvas.js"></script>
	<script src="/ad/js/jquery.flot.js"></script>
	<script src="/ad/js/jquery.flot.pie.js"></script>
	<script src="/ad/js/jquery.flot.stack.js"></script>
	<script src="/ad/js/jquery.flot.resize.min.js"></script>
	
		<script src="/ad/js/jquery.chosen.min.js"></script>
	
		<script src="/ad/js/jquery.uniform.min.js"></script>
		
		<script src="/ad/js/jquery.cleditor.min.js"></script>
	
		<script src="/ad/js/jquery.noty.js"></script>
	
		<script src="/ad/js/jquery.elfinder.min.js"></script>
	
		<script src="/ad/js/jquery.raty.min.js"></script>
	
		<script src="/ad/js/jquery.iphone.toggle.js"></script>
	
		<script src="/ad/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="/ad/js/jquery.gritter.min.js"></script>
	
		<script src="/ad/js/jquery.imagesloaded.js"></script>
	
		<script src="/ad/js/jquery.masonry.min.js"></script>
	
		<script src="/ad/js/jquery.knob.modified.js"></script>
	
		<script src="/ad/js/jquery.sparkline.min.js"></script>
	
		<script src="/ad/js/counter.js"></script>
	
		<script src="/ad/js/retina.js"></script>

		<script src="/ad/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
