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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>友 情 链 接 修 改</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/friendlinks/{{ $friends->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							{{ method_field('PUT')}}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">友 情 连 接 名 称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="fname" value="{{ $friends->fname }}">
								  
								</div>
							  </div>
							 
							 
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">友 情 连 接 网 址 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="url" value="{{ $friends->url }}">
								   
								</div>
							  </div>
							   
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">负 责 人 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="person" value="{{$friends->person }}">
								   
								</div>
							  </div>
								
								<div class="control-group success">
								<label class="control-label" for="inputSuccess">负 责 人 电 话 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="phone" value="{{ $friends->phone }}">
								   
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">友 情 链 接 状 态 :</label>
								@if($friends->status == 0)
									<div class="controls">
									  <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" checked>待审核</span></div>
									  </label>
									  <div style="clear:both"></div>
									  <label class="radio">
										<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1"> 已通过</span></div>
									  </label>
									</div>
								@else
									<div class="controls">
									  <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" >待审核</span></div>
									  </label>
									  <div style="clear:both"></div>
									  <label class="radio">
										<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1" checked> 已通过</span></div>
									  </label>
									</div>
								@endif
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