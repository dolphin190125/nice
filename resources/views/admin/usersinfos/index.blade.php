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
			<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>用 户 列 表</h2>
			
		</div>
		<div class="box-content">
			<table class="table table-bordered" id="table_css">
				  <thead>
					  <tr>
						  <th>ID</th>
						  <th>用户名</th>
						  <th>性别</th>
						  <th>年龄</th>  
						  <th>头像</th>  
						  <th>邮箱</th>  
						  <th>电话</th>  
						  <th>地址</th> 
						                                          
					  </tr>
				  </thead>   
				  <tbody >
				  		<tr>
							<td>{{ $userinfo->id }}</td>
							<td>{{ $userinfo->users->uname }}</td>
							<td>
								@if($userinfo->sex == 0)
									<span>女</span>
								@elseif($userinfo->sex == 1)
									<span>男</span>
								@else
									<span>保密</span>
								@endif
							</td>
							<td>{{ $userinfo->age }}</td>
							<td>
								<img src="/uploads/{{ $userinfo->profile }}" style="height: 50px;">
							</td>
							<td> {{ $userinfo->users->email }}</td>
							<td> {{ $userinfo->users->phone }}</td>
							<td>{{ $userinfo->addr }}</td>
							
						</tr>
					
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 	
			 
			</div>     
		</div>
	</div>
@endsection