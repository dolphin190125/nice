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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>标 签 云 修 改</h2>
				
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="/admin/tagnames/{{ $tag_data->id }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<fieldset>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">标 签 云 名 称 :</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="tag_name" value="{{ $tag_data->tag_name}}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">所 属 分 类:</label>
							<div class="controls">
							  	<select id="selectError3" name="cates_id">
									@foreach($cates as $k=>$v)
										@if(substr_count($v->path,',') == 2)
											@if($v->id == $cates_id)
												<option value="{{$v->id}}" selected>{{$v->cates_name}}</option>
											@else
												<option value="{{$v->id}}">{{$v->cates_name}}</option>
											@endif
										@endif
									@endforeach
							  	</select>
							</div>
						</div>
					  	<div class="control-group success">
						<label class="control-label" for="inputSuccess">标 签 云 分 类 :</label>
							@if($tag_data->status == 1)
							<div class="controls">
							  	<label class="radio">
									<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="1" checked>热门*特卖</span></div>
							  	</label>
							  	<div style="clear:both"></div>
							  	<label class="radio">
									<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="2">数码*家电</span></div>
							  	</label>
							</div>
							@else
							<div class="controls">
							  	<label class="radio">
									<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="1" >热门*特卖</span></div>
							  	</label>
							  	<div style="clear:both"></div>
							  	<label class="radio">
									<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="2" checked>数码*家电</span></div>
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