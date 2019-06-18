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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>商 品 添 加</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="/admin/goods" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 名:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="title" value="{{ old('title') }}">
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
							<label class="control-label" for="inputSuccess">所 属 品 牌:</label>
							<div class="controls">
							  	<select id="selectError3" name="brands_id">
									<option value="0">--请选择--</option>
									@foreach($brands as $k=>$v)
										<option value="{{$v->id}}">{{$v->bname}}</option>
									@endforeach
							  	</select>
							</div>
						</div>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 价 格:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="price" value="{{ old('price') }}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 图 片:</label>
							<div class="controls">
							  	<input type="file" id="inputSuccess" name="pic" value="{{ old('pic') }}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 库 存:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="store" value="{{ old('store') }}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label">是 否 推 荐:</label>
							<div class="controls">
							  	<label class="radio">
									<div id="uniform-optionsRadios1"><span class="checked"><input type="radio" name="recommend" id="optionsRadios1" value="0" checked="">否</span></div>
							  	</label>
							  	<div style="clear:both"></div>
							  	<label class="radio">
									<div id="uniform-optionsRadios2"><span><input type="radio" name="recommend" id="optionsRadios2" value="1">是</span></div>
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