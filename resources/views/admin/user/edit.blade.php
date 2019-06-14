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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>用 户 修 改</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/users/{{ $user->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">用 户 名:</label>
								<div class="controls">
								  <input type="text" disabled id="inputSuccess" name="uname" value="{{ $user->uname }}">
								  
								</div>
							  </div>
							 
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">邮 &nbsp; 箱:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="email" value="{{ $user->email }}">
								   
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">电 &nbsp; 话:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="phone" value="{{ $user->phone }}">
								  
								</div>
							  </div>
							  <div class="control-group success">
							  	<div class="controls">
									<img src="/uploads/{{ $user->userinfo->profile }}" style="width: 50px;height: auto;border-radius: 50%;">
							  	</div>
								 
							  </div>
							 	<input type="hidden" name="old_profile" value="{{ $user->userinfo->profile }}">
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">头 &nbsp; 像:</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="profile" >
								  <!-- <img src="/uploads/{{ $user->userinfo->profile }}" style="width: 50px;height: auto;border-radius: 50%"> -->
								</div>
							  </div>
							 
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">修 &nbsp; 改</button>
								
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection