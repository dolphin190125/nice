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
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>订 单 详 情</h2>
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				<thead>
					<tr>
						<th>订单ID</th>
						<th>买家</th>
						<th>商品名称</th>
						<th>商品单价</th>
						<th>购买数量</th>
						<th>总价格</th>
						<th>支付方式</th>                                        
					</tr>
				</thead>   
				<tbody >
					<tr>
						<td>{{ $order->id }}</td>                             
						<td>{{ $order->orders_users->uname }}</td>                             
						<td>{{ $order->orders_goods->title }}</td>                             
						<td>{{ $order->prices }}</td>                             
						<td>{{ $order->numbers }}</td>                             
						<td>{{ $order->priceall }}</td>                             
						<td>
							@if($order->pay == 0)
								支付宝
							@elseif($order->pay == 1)
								微信
							@elseif($order->pay == 2)
								余额
							@elseif($order->pay == 3)
								银行卡
							@endif
						</td>                             
					</tr>
				</tbody>
			</table>  

		</div>

	</div>
	<a href="/admin/ordermanage/index"><button class="btn btn-info" style="float:right; width:150px">返回</button></a> 
@endsection