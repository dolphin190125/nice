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
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>商 品 详 情 列 表</h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				<thead>
					<tr>
						<th>商品标题</th>
						<th>商品描述</th>
						<th>商品属性</th>
						<th>商品型号</th>     
						<th>图片详情1</th>     
						<th>图片详情2</th>     
						<th>图片详情3</th>    
						<th>操作</th>                                          
					</tr>
				</thead>   
				<tbody >
					<tr>
						<td>{{ $goods->title }}</td>
						<td>{{ $goodsinfos[0]->desc }}</td>
						<td>{{ $goodsinfos[0]->capa }}</td>
						<td>{{ $goodsinfos[0]->taste }}</td>
						<td>
							<img src="/uploads/{{ $goodsinfos[0]->pic1 }}" style="width: 70px;height: auto">
						</td>  
						<td>
							<img src="/uploads/{{ $goodsinfos[0]->pic2 }}" style="width: 70px;height: auto">
						</td> 
						<td>
							<img src="/uploads/{{ $goodsinfos[0]->pic3 }}" style="width: 70px;height: auto">
						</td>                                   
						<td>
							<a href="/admin/goodsinfos/edit/{{$goods->id}}" class="btn btn-info">修改</a>
							<form action="/admin/goodsinfos/destroy/{{ $goodsinfos[0]->id }}" method="post" style="display:inline-block">
								{{ csrf_field() }}
								<input type="submit" value="删除" class="btn btn-danger">
							</form>
						</td>                                     
					</tr>
				</tbody>
			</table>     
		</div>
	</div>
@endsection