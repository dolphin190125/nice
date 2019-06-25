@extends('admin.layout.index')

@section('css')
<style type="text/css">
	#table_css th,#table_css td
	{
		text-align: center;
		padding-top: 15px;
	}
</style>
@endsection

@section('content')

<form action="/admin/adminusers" method="get">

	管理员名称: <input type="text" name="search_uname" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>管 理 员 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>ID</th>
						  <th>管理员名称</th>
						 
						  <th>头像</th>
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($admin_users_data as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->uname }}</td>
							
							<td>
								@if(!empty($v->profile))
								<img src="/uploads/{{ $v->profile }}" style="width: 100px;height:auto">
								@else
								<img src="/ad/img/tou.jpg" style="width: 100px;height:auto">
								@endif
							</td>
							<td>
								<a href="/admin/adminusers/{{ $v->id }}/edit" class="btn btn-info">修改角色</a>
								
							</td>
						</tr>
				  	@endforeach
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 		{{ $admin_users_data->appends(['search_uname'=>$search_uname])->links() }}
			 		
			<!--   <ul>
				<li><a href="#">Prev</a></li>
				<li class="active">
				  <a href="#">1</a>
				</li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">Next</a></li>
			  </ul> -->
			</div>     
		</div>
	</div>
	
@endsection