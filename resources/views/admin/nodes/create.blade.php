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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>权 限 添 加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/nodes" method="post">

							{{ csrf_field() }}
							<fieldset>
								<div class="control-group success">
								<label class="control-label" for="inputSuccess">权限描述 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="desc" value="{{ old('desc') }}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">控制器名称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="cname" value="{{ old('cname') }}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">方法名称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="aname" value="{{ old('aname') }}">
								  
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