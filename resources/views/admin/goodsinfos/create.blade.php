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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>添 加 商 品 详 情</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="/admin/goodsinfos/store/{{$goods->id}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset>
						<div class="control-group success">
							<label class="control-label">商 品 名 称:</label>
							<div class="controls">
							  	<span class="input-xlarge uneditable-input">{{$goods->title}}</span>
							</div>
						</div>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 描 述:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="desc" value="{{ old('title') }}" style="width:270px">
							</div>
					  	</div>
						<div class="control-group success">
							<label class="control-label" for="inputSuccess">图 片 详 情 1:</label>
							<div class="controls">
							  	<input type="file" id="inputSuccess" name="pic1">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">图 片 详 情 2:</label>
							<div class="controls">
							  	<input type="file" id="inputSuccess" name="pic2">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">图 片 详 情 3:</label>
							<div class="controls">
							  	<input type="file" id="inputSuccess" name="pic3">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 型 号:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="capa" value="{{ old('capa') }}" style="width:270px">
							</div>
					  	</div>
					  	<div class="control-group success">
							<label class="control-label" for="inputSuccess">商 品 属 性:</label>
							<div class="controls">
							  	<input type="text" id="inputSuccess" name="taste" value="{{ old('taste') }}" style="width:270px">
							</div>
					  	</div>
					  	<div class="form-actions">
							<button type="submit" class="btn btn-primary">添 &nbsp; 加</button>&nbsp;&nbsp;&nbsp;
							<a href="/admin/goods" class="btn btn-warning">返 &nbsp; 回</a>
					  	</div>
					</fieldset>
				</form>
			</div>
		</div><!--/span-->
	</div><!--/row-->
@endsection