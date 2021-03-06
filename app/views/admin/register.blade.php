@extends('admin.layout')
@section('title', 'Register new User')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">New User</h3>
	</div>
	@if (Session::has('login_errors'))
		<span class="error">Username or password incorrect.</span>
	@endif
	@if (Session::has('success'))
		<span class="error">User added!</span>
	@endif
	{{ Form::open( array('role' => 'form') ) }}
	<div class="box-body">
		<div class="form-group">
			<!-- username field -->
			<p>{{ Form::label('username', 'Username') }}</p>
			<p>{{ Form::text('username', '', array('class' => 'form-control')) }}</p>
		</div>
 		
 		<div class="form-group">
			<!--  nickname field -->
			<p>{{ Form::label('nickname', 'Nickname') }}</p>
			<p>{{ Form::text('nickname', '', array('class' => 'form-control')) }}</p>
		</div>
		
 		<div class="form-group">
			<!--  email field -->
			<p>{{ Form::label('email', 'Email') }}</p>
			<p>{{ Form::text('email', '', array('class' => 'form-control')) }}</p>
		</div>
		
 		<div class="form-group">
			<!-- password field -->
			<p>{{ Form::label('password', 'Password') }}</p>
			<p>{{ Form::text('password', '', array('class' => 'form-control')) }}</p>
		</div>
	</div>
 <div class="box-footer">
		<!-- submit button -->
		<p>{{ Form::submit('Register User', array('class' => 'btn btn-primary pull-right')) }}</p>
		<div class="clearfix clear"></div>
</div>
{{ Form::close() }}
</div>

<!--  ALL USERS -->
<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">All Users</h3>
	</div>
	<div class="box-body">
		<table class="table">
			<tr>
				<td>Username</td>
				<td>Nickname</td>
				<td>Email</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			@foreach ( $members as $m )
			<tr>
				<td>{{ $m->username }}</td>
				<td>{{ $m->nickname }}</td>
				<td>{{ $m->email }}</td>
				<td></td>
				<td><a href="/admin/user/edit/{{ $m->id }}">Edit</a></td>
				<td><a href="/admin/user/delete/{{ $m->id }}">Delete</a></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="../admin/settings"><i class="fa fa-cogs"></i> Settings</a></li>
		<li class="active"><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="/admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="/admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop