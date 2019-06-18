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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>友 情 链 接 添 加</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/friendlinks" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">友 情 连 接 名 称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="fname" value="{{ old('fname') }}">
								  
								</div>
							  </div>
							 
							 
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">友 情 连 接 网 址 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="url" value="{{ old('url') }}">
								   
								</div>
							  </div>
							   
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">负 责 人 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="person" value="{{ old('pserson') }}">
								   
								</div>
							  </div>
								
								<div class="control-group success">
								<label class="control-label" for="inputSuccess">负 责 人 电 话 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="phone" value="{{ old('phone') }}">
								   
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">友 情 链 接 状 态 :</label>

									<div class="controls">
									  <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" checked>待审核</span></div>
									  </label>
									  <div style="clear:both"></div>
									  <label class="radio">
										<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1"> 已通过</span></div>
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