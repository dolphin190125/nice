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

<form action="/admin/tagnames" method="get">

	标签云名称: <input type="text" name="search_tagname" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>标 签 云 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>标签云ID</th>
						  <th>标签云名称</th>
						  <th>标签云分类</th>       
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($tags_data as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->tag_name }}</td>
							<td>
								@if($v->status == 1 )
									<span>热门*特卖</span>
								@else
									<span>数码*家电</span>
								@endif
							</td>
							<td>
								<a href="/admin/tagnames/{{ $v->id }}/edit" class="btn btn-info">修改</a>
								<form action="/admin/tagnames/{{ $v->id }}" method="post" style="display:inline-block">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<input type="submit" value="删除" onclick="return confirm('你确定要删除吗?')" class="btn btn-danger">
								</form>
							</td>
						</tr>
				  	@endforeach
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 	{{ $tags_data->appends(['search_tagname'=>$search_tagname])->links() }}
			
			</div>     
		</div>
	</div>
	
@endsection