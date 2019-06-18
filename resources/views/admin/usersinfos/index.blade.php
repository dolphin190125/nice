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

<form action="/admin/userinfos/index" method="get">

	用 户 名: <input type="text" name="search_uname" value="{{ $params['search_uname'] or '' }}">

	<input type="submit" class="btn btn-info" value="查询">
</form>
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
						  <th>地址</th> 
						  <th>操作</th>                                          
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
							<td>{{ $userinfo->addr }}</td>
							<td>
								<a href="/admin/userinfos/edit/{{ $userinfo->id }}" class="btn btn-success">修改</a>
								
							</td>
						</tr>
					
				  </tbody>
			 </table>  
			 <div class="pagination pagination-centered">
			 	
			 
			</div>     
		</div>
	</div>
@endsection