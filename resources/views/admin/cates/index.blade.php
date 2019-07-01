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

<form action="/admin/cates" method="get">
	分 类 名: <input type="text" name="search_cates_name" value="{{ $params['search_cates_name'] or '' }}" style="margin-top: 10px">
	<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
</form>
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>分 类 列 表</h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				<thead>
					<tr>
						<th>ID</th>
						<th>分类名称</th>
						<th>父级ID</th>
						<th>分类路径</th>     
						<th>操作</th>                                          
					</tr>
				</thead>   
				<tbody >
				  	@foreach($cates as $k=>$v)
					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->cates_name }}</td>
						<td>{{ $v->pid }}</td>
						<td>{{ $v->path }}</td>                                   
						<td>
							@if(substr_count($v->path,',') < 2)
							<a href="/admin/cates/create?id={{$v->id}}" class="btn btn-info">添加子分类</a>
							@endif
							@if(substr_count($v->path,',') == 2)
								@if($v->status == 1)
									<a href="/admin/show/desta/{{$v->id}}" class="btn btn-danger">取消显示</a>
								@else
									<a href="/admin/show/sta/{{$v->id}}" class="btn btn-warning">横栏显示</a>
								@endif
							@endif
						</td>                                       
					</tr>
					@endforeach
				</tbody>
			</table>  
			<div class="pagination pagination-centered">
				{{ $cates->appends($params)->links() }}
			</div>     
		</div>
	</div>
@endsection