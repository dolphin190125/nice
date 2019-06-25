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

<form action="/admin/roles" method="get">

	角色名称: <input type="text" name="search_rname" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>角 色 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>ID</th>
						  <th>角色名称</th>
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($roles_data as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->role_name }}</td>
							<td>
								<a href="/admin/roles/{{$v->id}}/edit" class="btn btn-info">修改角色权限</a>
							</td>
						</tr>
				  	@endforeach
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 	{{ $roles_data->appends(['search_rname'=>$search_rname])->links() }}
		
			</div>     
		</div>
	</div>
	
@endsection