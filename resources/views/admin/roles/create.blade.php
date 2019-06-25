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
						<form class="form-horizontal" action="/admin/roles" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">角色名称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="role_name" value="{{ old('role_name') }}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">角色权限 :</label>
								<div class="controls">
								 	@foreach($list as $k=>$v)
								 		<div style="margin-top: 6px;font-size: 16px; color:#808080">{{ $controller[$k] }} &nbsp;<small>({{ $k }})</small></div>
								 		@foreach($v as $kk=>$vv)
									  <label class="checkbox inline">
										<input type="checkbox" id="inlineCheckbox1" name="node_id[]" value="{{ $vv['id'] }}">{{ $vv['desc'] }}
									  </label>
									  	@endforeach
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