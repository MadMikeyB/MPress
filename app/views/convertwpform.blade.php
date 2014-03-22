@extends('adminlayout')
@section('title', 'Convert from WordPress')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Convert from WordPress</h3>
	</div>
	<div class="box-body">
	{{Form::open(array('files' => true, 'role' => 'form'));}}
		<div class="form-group">
			{{Form::label('Database Table')}}<br />
			{{Form::file('file')}}<br />
			<span class="desctext">Please upload your wp_posts.sql table</span><br /><br />
		</div>
		
		<div class="form-group">
			{{Form::label('OR.. Database Table Name')}}
			{{Form::text('dbname', Input::old('dbname'), array('placeholder' => 'wp_posts', 'class' => 'form-control') )}}
			<span class="desctext">Alternately, if you have a wp_posts.sql table in your database, enter it's name here.</span><br /><br />
		</div>
		
		 <div class="box-footer">
			{{Form::submit('Convert!', array('class' => 'btn btn-primary') );}}		
		</div>
	</div>
</div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="/admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="/admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li class="active"><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop