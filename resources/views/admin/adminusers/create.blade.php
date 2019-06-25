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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>角 色 添 加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/adminusers" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">用户名 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="uname" value="{{ old('role_name') }}">
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">密码 :</label>
								<div class="controls">
								  <input type="password" id="inputSuccess" name="upass" value="{{ old('role_name') }}">
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">确认密码 :</label>
								<div class="controls">
								  <input type="password" id="inputSuccess" name="repass" value="{{ old('role_name') }}">
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">头像 :</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="profile" value="{{ old('role_name') }}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label">角色权限 :</label>
								<div class="controls">
									@foreach($roles_data as $k=>$v)
								  <label class="radio">
									<input type="radio" name="role_id" id="optionsRadios1" value="{{ $v->id}}" checked>{{ $v->role_name}}
								  </label>
								   <div style="clear:both"></div>

								  	@endforeach
								 
								  
								</div>
							  </div>

							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">添 &nbsp; 加</button>
								
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div>
		</div>	

@endsection