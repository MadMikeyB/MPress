@extends('adminlayout')
@section('title', 'Edit User')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Edit User</h3>
	</div>
	{{ Form::open( array('role' => 'form') ) }}
	<div class="box-body">
		<div class="form-group">
			<!-- username field -->
			<p>{{ Form::label('username', 'Username') }}</p>
			<p>{{ Form::text('username', $member->username, array('class' => 'form-control')) }}</p>
		</div>
 		
 		<div class="form-group">
			<!--  nickname field -->
			<p>{{ Form::label('nickname', 'Nickname') }}</p>
			<p>{{ Form::text('nickname', $member->nickname, array('class' => 'form-control')) }}</p>
		</div>
		
 		<div class="form-group">
			<!--  email field -->
			<p>{{ Form::label('email', 'Email') }}</p>
			<p>{{ Form::text('email', $member->email, array('class' => 'form-control')) }}</p>
		</div>
		
 		<div class="form-group">
			<!-- password field -->
			<p>{{ Form::label('password', 'Password') }}</p>
			<p>{{ Form::password('password', array('class' => 'form-control')) }}</p>
		</div>
	</div>
 <div class="box-footer">
		<!-- submit button -->
		<p>{{ Form::submit('Edit User', array('class' => 'btn btn-primary')) }}</p>
</div>
{{ Form::close() }}
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