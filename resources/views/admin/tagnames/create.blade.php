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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>标 签 云 添 加</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="/admin/tagnames" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">标 签 云 名 称 :</label>
							<div class="controls">
							  <input type="text" id="inputSuccess" name="tag_name" value="{{ old('tag_name') }}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">所 属 分 类:</label>
							<div class="controls">
							  	<select id="selectError3" name="cates_id">
									<option value="0">--请选择--</option>
									@foreach($cates as $k=>$v)
										@if(substr_count($v->path,',') == 2)
										<option value="{{$v->id}}">{{$v->cates_name}}</option>
										@endif
									@endforeach
							  	</select>
							</div>
						</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">标 签 云 分 类 :</label>
							<div class="controls">
							  	<label class="radio">
									<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="status" value="1" checked>热门*特卖</span></div>
								  </label>
							  	<div style="clear:both"></div>
							  	<label class="radio">
									<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="status" value="2">数码*家电</span></div>
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