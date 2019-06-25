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

<form action="/admin/users" method="get">

	用 户 名: <input type="text" name="search_uname" value="{{ $params['search_uname'] or '' }}" style="margin-top: 10px">

	邮 &nbsp;箱: <input type="text" name="search_email" value="{{ $params['search_email'] or '' }}" style="height: 30px">
 
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
						  <th>邮箱</th>
						  <th>手机号</th>  
						  <th>头像</th> 
						  <th>状态</th> 
						  <th>用户详情</th> 
						  <th>头像创建时间</th>       
						  <th>操作</th>                                          
					  </tr>
				  </thead>   
				  <tbody >
				  	@foreach($users as $k=>$v)
					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->uname }}</td>
						<td>{{ $v->email }}</td>
						<td>{{ $v->phone }}</td>                                       
						<td>
							<img src="/uploads/{{ $v->userinfo->profile }}" style="width: 50px;height: auto">
						</td>
						<td>{{ $v->status == 0 ? '未激活' : '已激活' }}</td>   
						<td>
							
							<!-- <a href="/admin/userinfos/create/{{ $v->id }}" class="btn btn-warning">添加详情</a> -->
							<a href="/admin/userinfos/index/{{ $v->id }}" class="btn btn-success">查看详情</a>
						</td>                                    
						<td>{{ $v->created_at }}</td>                                       
						<td>
							<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-info">修改</a>
							<form action="/admin/users/{{ $v->id }}" method="post" style="display:inline-block">
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
			 	{{ $users->appends($params)->links() }}
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