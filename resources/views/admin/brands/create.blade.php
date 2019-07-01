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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>品 牌 添 加</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="/admin/brands" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">品牌名称:</label>
							<div class="controls">
							  <input type="text" id="inputSuccess" name="bname" value="{{ old('bname') }}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">品牌图片:</label>
							<div class="controls">
							  	<input type="file" id="inputSuccess" name="img" value="{{ old('img') }}">
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
					  	<div class="form-actions">
							<button type="submit" class="btn btn-primary">添 &nbsp; 加</button>
						
					  	</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

@endsection