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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>用 户 详 情 信 息 修 改</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/userinfos/update/{{ $userinfo->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">用 户 名:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" disabled name="uname" value="{{ $userinfo->users->uname}}">
								  
								</div>
							  </div>
							 
							   <div class="control-group success">
									<label class="control-label" for="inputSuccess">性&nbsp; 别:</label>
								<div class="controls">
									@if($userinfo->sex == 0)
									  <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="sex" value="0" checked>女</span></div>
									  </label>
									  <div style="clear:both"></div>
									  <label class="radio">
										<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="sex" value="1">男</span></div>
									  </label>
									   <div style="clear:both"></div>
									   <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="sex" value="2" >保密</span></div>
									  </label>
									  @elseif($userinfo->sex == 1)
									   <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="sex" value="0" >女</span></div>
									  </label>
									  <div style="clear:both"></div>
									  <label class="radio">
										<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="sex" value="1" checked>男</span></div>
									  </label>
									   <div style="clear:both"></div>
									   <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="sex" value="2" >保密</span></div>
									  </label>
									  @else
									   <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="sex" value="0" >女</span></div>
									  </label>
									  <div style="clear:both"></div>
									  <label class="radio">
										<div id="uniform-optionsRadios2"><span class="checked"><input type="radio" id="inputSuccess" name="sex" value="1">男</span></div>
									  </label>
									   <div style="clear:both"></div>
									   <label class="radio">
										<div id="uniform-optionsRadios1"><span class=""><input type="radio" id="inputSuccess" name="sex" value="2" checked>保密</span></div>
									  </label>
									  @endif
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">年 &nbsp; 龄:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="age" value="{{ $userinfo->age }}">
								  
								</div>
							  </div>
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">住 &nbsp; 址:</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="addr" value="{{ $userinfo->addr }}">
								  
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