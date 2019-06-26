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

	<!-- <form action="" method="get">
		商 品 名: <input type="text" name="search_title" value="" style="margin-top: 10px">
		<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
	</form> -->
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订 单 列 表</h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				<thead>
					<tr>
						<th>ID</th>
						<th>商品图片</th>
						<th>商品名称</th>
						<th>评论用户</th>
						<th>评论内容</th>
						<th>星级评论</th>
						<th>评论图片</th>              
					</tr>
				</thead>   
				<tbody >
					@foreach($speaks as $k=>$v)
					<tr>
						<td>{{$v->id}}</td>
						<td><img src="/uploads/{{$v->speaks_goods->pic}}" style="width:60px"></td>
						<td>{{$v->speaks_goods->title}}</td>
						<td>{{$v->speaks_users->uname}}</td>
						<td>{{$v->speak}}</td>
						<td>
							@if($v->start == 0)
	                            ★
	                        @elseif($v->start == 1)
	                            ★★
	                        @elseif($v->start == 2)
	                            ★★★
	                        @elseif($v->start == 3)
	                            ★★★★
	                        @elseif($v->start == 4)
	                            ★★★★★
	                        @endif
						</td>
						<td><img src="/uploads/{{$v->picture}}" style="width:60px"></td>
					</tr>
					@endforeach
				</tbody>
			</table>  
			<div class="pagination pagination-centered">
			   {{ $speaks->appends($params)->links() }} 
			</div>
		</div>
	</div>
@endsection