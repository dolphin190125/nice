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

<form action="/admin/nodes" method="get">

	权限名称: <input type="text" name="search_desc" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px;"">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>权 限 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>ID</th>
						  <th>权限名称</th>
						  <th>控制器名称</th>
						  <th>方法名称</th>
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($nodes_data as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->desc }}</td>
							<td>{{ $v->cname }}</td>
							<td>{{ $v->aname }}</td>
							<td>
								<a href="/admin/nodes/{{ $v->id }}/edit" class="btn btn-info">修改</a>
								
							</td>
						</tr>
				  	@endforeach
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 	
			 		
			 	{{ $nodes_data->appends(['search_desc'=>$search_desc])->links() }}
			</div>     
		</div>
	</div>
	
@endsection