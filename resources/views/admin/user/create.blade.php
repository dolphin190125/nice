@extends('admin.layout.index')

@section('content')


	@if (count($errors) > 0)
	<div class="alert alert-error">
		<ul>
			<button type="button" class="close" data-dismiss="alert">×</button>
			@foreach($errors->all() as $error)
				<li> {{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>用 户 添 加</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/users" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">用 户 名:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="uname" value="{{ old('uname') }}">
								  
								</div>
							  </div>
							 
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">密 &nbsp; 码:</label>
								<div class="controls">
								  <input type="password" id="inputSuccess" name="upass">
								  
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">确 认 密 码:</label>
								<div class="controls">
								  <input type="password" id="inputSuccess" name="repass">
								  
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">邮 &nbsp; 箱:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="email" value="{{ old('email') }}">
								   
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">电 &nbsp; 话:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="phone" value="{{ old('phone') }}">
								  
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">头 &nbsp; 像:</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="profile" >
								  
								</div>
							  </div>
							  <div class="control-group success">
									<label class="control-label" for="inputSuccess">状 &nbsp; 态:</label>
										<div class="controls">
											  <label class="radio">
												<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" checked>未激活</span></div>
											  </label>
											  <div style="clear:both"></div>
											  <label class="radio">
												<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1">已激活</span></div>
											  </label>
										</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">添 &nbsp; 加</button>
								
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection