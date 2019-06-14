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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>品 牌 修 改</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/brands/{{ $brand->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}

							{{ method_field('PUT')}}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">品牌名称:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" disabled name="bname" value="{{ $brand->bname }}">
								</div>
							  </div>
							  <img src="/uploads/{{ $brand->img }}" style="height: 150px;margin-left: 100px">

							  <input type="hidden" name="old_img" value="{{ $brand->img}}">

							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">品牌图片:</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="img" >
								</div>
							  </div>
							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">修 &nbsp; 改</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div>
		</div>	

@endsection