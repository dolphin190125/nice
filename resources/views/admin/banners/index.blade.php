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

<form action="/admin/banners" method="get">

	轮播图标题: <input type="text" name="search_title" value="{{ $banners['search_title'] }} ">

	<input type="submit" class="btn btn-info" value="查询">
</form>


	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>轮 播 图 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>轮播图ID</th>
						  <th>轮播图标题</th>
						  <th>轮播图图片</th>  
						  <th>轮播图状态</th>       
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($banners as $k=>$v)
						<tr>
							<td>{{ $v->id }}</td>
							<td>{{ $v->title }}</td>
							<td>
								<img src="/uploads/{{ $v->pic }}" title="{{ $v->desc }}" style="width: 200px; height: auto">
							</td>
							<td>
								@if($v->status == 0)
										<a href="javascript:;" onclick="changeStatus({{$v->id}},this)"><img src="/ad/img/off.png" style="width: 60px; height:auto;margin-top: 12px"></a>
										
									@else
										<a href="javascript:;" onclick="changeStatus({{$v->id}},this)"><img src="/ad/img/on.png" style="width: 60px; height:auto;margin-top: 12px"></a>
										
										
									@endif
								
							</td>
							<td>
								<a href="/admin/banners/{{ $v->id }}/edit" class="btn btn-info">修改</a>
							<form action="/admin/banners/{{ $v->id }}" method="post" style="display:inline-block">
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
			 	{{ $banners->appends(['search_title'=>$search_title])->links() }}
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
	<script type="text/javascript">
		// 改变状态
			function changeStatus(id,obj)
			{
				
				$.get('/admin/banners/changeStatus',{id:id},function(res){
					// console.log(res);
					if(res == 'ok'){
						// console.log('123');
						$(obj).find('img').prop('src','/ad/img/on.png');
					}else if(res == 'xx'){
						$(obj).find('img').prop('src','/ad/img/off.png');
					}else{
						alert('激活失败或者停止激活失败');
					}
				},'html');
			}
	</script>
@endsection