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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>轮 播 图 修 改</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/banners/{{ $banner->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 标 题 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="title" value="{{ $banner->title }}">
								  
								</div>
							  </div>
							 
							 
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 描 述 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="desc" value="{{ $banner->desc }}">
								   
								</div>
							  </div>
							   <img src="/uploads/{{ $banner->pic }}" style="width: 200px; height: auto;margin-left: 100px">
							   
							   <input type="hidden" name="old_pic" value="{{ $banner->pic }}">
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 图 片 :</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="pic" >
								  
								</div>
							  </div>

							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 状 态 :</label>
								
									@if($banner->status == 0)
 										<div class="controls">
										  <label class="radio">
											<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" checked>未开启</span></div>
										  </label>
										  <div style="clear:both"></div>
										  <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1"> 已开启</span></div>
										  </label>
										</div>
									@else
										 <div class="controls">
										  <label class="radio">
											<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="0" >未开启</span></div>
										  </label>
										  <div style="clear:both"></div>
										  <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="1" checked> 已开启</span></div>
										  </label>
										</div>
									@endif
								 
								 
								   
								</div>

								<div class="control-group success">
								<label class="control-label" for="inputSuccess">轮 播 图 分 类 :</label>
								
									@if($banner->type == 1)
 										<div class="controls">
										  <label class="radio">
											<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="type" value="1" checked>热门*特卖</span></div>
										  </label>
										  <div style="clear:both"></div>
										  <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="type" value="2"> 数码*家电</span></div>
										  </label>
										   <div style="clear:both"></div>
										   <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="type" value="0">首页大图</span></div>
										  </label>
										</div>
									@elseif($banner->type == 2)
										 <div class="controls">
										  <label class="radio">
											<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="type" value="0" >热门*特卖</span></div>
										  </label>
										  <div style="clear:both"></div>
										  <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="type" value="1" checked> 数码*家电</span></div>
										  </label>
										   <div style="clear:both"></div>
										   <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="type" value="0">首页大图</span></div>
										  </label>
										</div>
									@else
									 	<div class="controls">
										  <label class="radio">
											<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="type" value="0" >热门*特卖</span></div>
										  </label>
										  <div style="clear:both"></div>
										  <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="type" value="1" > 数码*家电</span></div>
										  </label>
										   <div style="clear:both"></div>
										   <label class="radio">
											<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="type" value="0" checked>首页大图</span></div>
										  </label>
										</div>
									@endif
								 
								 
								   
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