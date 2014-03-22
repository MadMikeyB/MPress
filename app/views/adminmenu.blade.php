@extends('adminlayout')
@section('title', 'Add New Menu Item')
@section('content')
<iframe id="menu_preview" src="http://{{ $_SERVER['HTTP_HOST'] }}/preview_menu" style="width: 100%; height:175px; border: 1px solid #000;"></iframe>
<br /><br />
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">New Menu Item</h3>
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
			<p>{{ Form::text('title', '', array('class' => 'form-control')) }}</p>
		</div>
		<!--  URL field -->
		<div class="form-group">
			<p>{{ Form::label('url', 'URL') }}</p>
			<p>{{ Form::text('url', '', array('class' => 'form-control')) }}</p>
		</div>
		<!--  position field -->
		<div class="form-group">
			<p>{{ Form::label('position', 'Menu Position') }}</p>
			<p>{{ Form::text('position', '', array('class' => 'form-control')) }}</p>
		</div>
		 <!-- title field -->
		 {{-- <p>{{ Form::label('group', 'Permissions') }}</p>
		 {{ $errors->first('group', '<p class="error">:message</p>') }}
		 <p>{{ Form::select('group', array('guest' => 'Everyone can see this menu item', 'admin' => 'Only registered users (admins) can see this menu item'), 'guest'); }} --}}
		<!-- submit button -->
	</div>
 	
 	<div class="box-footer">
		<p>{{ Form::submit('Add Menu Item', array('class' => 'btn btn-primary')) }}</p>
	</div>
		{{ Form::close() }}
</div>

<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">Menu Items</h3>
	</div>
	<div class="box-body">
		<table class="table">
			<tr>
				<td>Position</td>
				<td>Title</td>
				<td>URL</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			@if ( $menu )
			@foreach ( $menu as $m )
			<tr>
				<td>{{ $m->position }}</td>
				<td>{{ $m->title }}</td>
				<td>{{ $m->url }}</td>
				<td></td>
				<td><a href="/admin/menu/edit/{{ $m->id }}">Edit</a></td>
				<td><a href="/admin/menu/delete/{{ $m->id }}">Delete</a></td>
			</tr>
			@endforeach
			@endif
		</table>
	</div>	
</div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
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