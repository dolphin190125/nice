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

	<form action="/admin/goods" method="get">
		商 品 名: <input type="text" name="search_title" value="{{ $params['search_title'] or '' }}" style="margin-top: 10px">
		<input type="submit" class="btn btn-info" value="查询" style="height: 30px">
	</form>
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>商 品 列 表</h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				<thead>
					<tr>
						<th>ID</th>
						<th>商品标题</th>
						<th>商品图片</th>
						<th>所属分类</th>
						<th>所属品牌</th>     
						<th>商品价格</th>     
						<th>商品销量</th>     
						<th>商品库存</th>     
						<th>商品状态</th>     
						<th>是否推荐</th>     
						<th>商品详情</th>                                          
						<th>操作</th>                                          
					</tr>
				</thead>   
				<tbody >
					@foreach($goods as $k=>$v)
					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->title }}</td>
						<td>
							<img src="/uploads/{{ $v->pic }}" style="width: 70px;height: auto">
						</td>
						<td>{{ $v->cates_name }}</td>                                     
						<td>{{ $v->brands_name }}</td>                                     
						<td>{{ $v->price }}</td>                                     
						<td>{{ $v->sale }}</td>                                     
						<td>{{ $v->store }}</td>                                     
						<td>
							@if($v->status ==0)
								普通商品
							@elseif($v->status ==1)
								热门商品
							@elseif($v->status ==2)
								限时特卖
							@else
								猜你喜欢
							@endif
						</td>                                     
						<td>
							@if($v->recommend ==0)
								暂不推荐
							@else
								推荐
							@endif
						</td>                                     
						<td>
							<a href="/admin/goodsinfos/create/{{ $v->id }}" class="btn btn-info">添加</a>
							<a href="/admin/goodsinfos/index/{{ $v->id }}" class="btn btn-success">查看</a>
						</td>
						<td> 
							<a href="/admin/goods/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
							<form action="/admin/goods/{{ $v->id }}" method="post" style="display:inline-block">
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
				{{ $goods->appends($params)->links() }}
			</div>     
		</div>
	</div>
@endsection