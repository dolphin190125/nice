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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>轮 播 图 添 加</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/banners" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 标 题 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="title" value="{{ old('title') }}">
								  
								</div>
							  </div>
							 
							 
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 描 述 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="desc" value="{{ old('desc') }}">
								   
								</div>
							  </div>
							   
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 图 片 :</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="pic" >
								  
								</div>
							  </div>

							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 状 态 :</label>

								<div class="controls">
								  <label class="radio">
									<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" checked>未开启</span></div>
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1"> 已开启</span></div>
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