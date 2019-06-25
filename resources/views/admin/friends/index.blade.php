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

<form action="/admin/friendlinks" method="get">

	链接名称: <input type="text" name="search_fname" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>友 情 链 接 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>友情链接ID</th>
						  <th>友情链接名称</th>
						  <th>友情链接网址</th> 
						  <th>链接负责人</th> 
						  <th>负责人电话</th> 
						  <th>通过状态</th> 
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($friends as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->fname }}</td>
							<td>{{ $v->url }}</td>
							<td>{{ $v->person }}</td>
							<td>{{ $v->phone }}</td>
							<td>
								{{ $v->status == 0 ? '待审核' : '已通过' }}
							</td>
							<td>
								<a href="/admin/friendlinks/{{ $v->id }}/edit" class="btn btn-info">修改</a>
								<form action="/admin/friendlinks/{{ $v->id }}" method="post" style="display:inline-block">
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
			 	{{ $friends->appends(['search_fname'=>$search_fname])->links() }}
			 		
			  <!-- <ul>
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