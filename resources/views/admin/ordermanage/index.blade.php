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
						<th>订单号</th>
						<th>买家</th>
						<th>收货地址</th>
						<th>联系方式</th>
						<th>收货人</th>
						<th>下单时间</th>
						<th>支付方式</th>                                          
						<th>订单状态</th>                                          
						<th>操作</th>                                          
					</tr>
				</thead>   
				<tbody >
					@foreach($orders as $k=>$v)
					<tr>
						<td>{{ $v->id }}</td>                               
						<td>{{ $v->orders_numbers }}</td>                               
						<td>{{ $v->orders_users->uname }}</td>                               
						<td style="width:130px">{{ $v->orders_addresses->address }}</td>                
						<td>{{ $v->orders_addresses->phone }}</td>                               
						<td>{{ $v->orders_addresses->name }}</td>                               
						<td>{{ $v->created_at }}</td>                               
						<td>
							@if($v->pay == 0)
								支付宝
							@elseif($v->pay == 1)
								微信
							@elseif($v->pay == 2)
								余额
							@elseif($v->pay == 3)
								银行卡
							@endif
						</td>                               
                              
						<td>
							@if($v->status == 0)
								<font style="color:gray">未发货</font>
							@elseif($v->status == 1)
								<font style="color:gray">已发货</font>
							@elseif($v->status == 2)
								<font style="color:gray">已收货</font>
							@elseif($v->status == 3)
								<font style="color:gray">已取消订单</font>
							@elseif($v->status == 4)
								<font style="color:gray">申请取消订单</font>
							@endif
						</td>                               
						<td style="width:250px">
							<a href="/admin/ordermanage/info/{{$v->id}}"><button class="btn btn-info">查看详情</button></a>
							<a href="/admin/ordermanage/cancel/{{$v->id}}"><button class="btn btn-danger">取消订单</button></a>
							<a href="/admin/ordermanage/send/{{$v->id}}"><button class="btn btn-success">发货</button></a>
						</td>                               
					</tr>
					@endforeach
				</tbody>
			</table>  
			<div class="pagination pagination-centered">
			    {{$orders->appends($params)->links() }}
			</div>     
		</div>
	</div>
@endsection