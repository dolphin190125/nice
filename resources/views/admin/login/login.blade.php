
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>后台登录</title>
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
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(/ad/img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<hr>
					<h2>登 录</h2>
					<br>
					<form class="form-horizontal" action="/admin/dologin" method="post">
						
						<fieldset>
							{{ csrf_field() }}
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="uname" id="username" type="text" placeholder="用户名"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="upass" id="password" type="password" placeholder="密码"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />记住密码</label>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
						
					</form>
					<hr>
					
						
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="#">Admin templates</a></li>
					<li><a href="http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>
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
