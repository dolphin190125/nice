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

<form action="/admin/brands" method="get">

	商品品牌: <input type="text" name="search_bname" value="">

	<input type="submit" class="btn btn-info" value="查询">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>品 牌 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>品牌ID</th>
						  <th>商品品牌名称</th>
						  <th>商品品牌图片</th> 
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($brands as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->bname }}</td>
							<td>
								<img src="/uploads/{{ $v->img }}" style="height: 100px;">
							</td>
							<td>
								<a href="/admin/brands/{{ $v->id }}/edit" class="btn btn-info">修改</a>
							<form action="/admin/brands/{{ $v->id }}" method="post" style="display:inline-block">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" value="删除" class="btn btn-danger">
							</form>
							</td>
						</tr>
				  	@endforeach
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 		{{ $brands->appends(['search_bname'=>$search_bname])->links() }}
			 <!--  <ul>
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