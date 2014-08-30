@extends('adminlayout')
@section('title', 'Edit Menu Item')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Edit Menu Item</h3>
	</div>
{{ Form::open(array('role' => 'form' )) }}
<div class="box-body">
<!-- check for login errors flash var -->
		@if (Session::has('success'))
		<span class="error">Menu added!</span>
		@endif
		<!-- title field -->
		<div class="form-group">
			<p>{{ Form::label('title', 'Title') }}</p>
			<p>{{ Form::text('title', $menu->title, array('class' => 'form-control')) }}</p>
		</div>
		<!--  URL field -->
		<div class="form-group">
			<p>{{ Form::label('url', 'URL') }}</p>
			<p>{{ Form::text('url', $menu->url, array('class' => 'form-control')) }}</p>
		</div>
		<!--  position field -->
		<div class="form-group">
			<p>{{ Form::label('position', 'Menu Position') }}</p>
			<p>{{ Form::text('position', $menu->position, array('class' => 'form-control')) }}</p>
		</div>
		 <!-- title field -->
		 {{-- <p>{{ Form::label('group', 'Permissions') }}</p>
		 {{ $errors->first('group', '<p class="error">:message</p>') }}
		 <p>{{ Form::select('group', array('guest' => 'Everyone can see this menu item', 'admin' => 'Only registered users (admins) can see this menu item'), 'guest'); }} --}}</p>
		<!-- submit button -->
		</div>
		<div class="box-footer">
			<p>{{ Form::submit('Add Menu Item', array('class' => 'btn btn-primary pull-right')) }}</p>
			<div class="clearfix clear"></div>
		</div>
		{{ Form::close() }}
	</div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="../admin/settings"><i class="fa fa-cogs"></i> Settings</a></li>
		<li><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li class="active"><a href="/admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="/admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop