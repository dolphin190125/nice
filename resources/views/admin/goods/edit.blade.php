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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>商 品 修 改</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="/admin/goods/{{ $goods->id }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<fieldset>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 名:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="title" value="{{ $goods->title }}">
							</div>
					  	</div>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">所 属 分 类:</label>
							<div class="controls">
							  	<select id="selectError3" name="cates_id">
									@foreach($cates as $k=>$v)
										@if($v->id == $cates_id)
											<option value="{{$v->id}}" selected>{{$v->cates_name}}</option>
										@else
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
									@foreach($brands as $k=>$v)
										@if($v->id == $brands_id)
											<option value="{{$v->id}}" selected>{{$v->bname}}</option>
										@else
											<option value="{{$v->id}}">{{$v->bname}}</option>
										@endif
									@endforeach
							  	</select>
							</div>
						</div>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 价 格:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="price" value="{{ $goods->price }}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 图 片:</label>
							<div class="controls">
								<img src="/uploads/{{ $goods->pic }}" style="width: 50px;height: auto">
							  	<input type="file" id="inputSuccess" name="pic">
							  	<input type="hidden" name="pic_path" value="{{$goods->pic}}">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 库 存:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="store" value="{{ $goods->store }}">
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
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 限 定:</label>
							<div class="controls">
							  	<select id="selectError3" name="status">
									<option value="0" selected>普通商品</option>
									<option value="1">热门商品</option>
									<option value="2">限时特卖</option>
									<option value="3">猜你喜欢</option>
							  	</select>
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