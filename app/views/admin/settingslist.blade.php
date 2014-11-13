@extends('admin.layout')
@section('title', 'Settings')
@section('content')

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">MPress Settings</h3>
	</div>
	
	<div class="box-body">
	
	
<div class="alert alert-danger alert-dismissable">
	<i class="fa fa-info"></i>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<b>Whoops!</b> This page doesn't quite work yet! I'm working on it. :)
</div>

{{ Form::open() }}
		<div class="form-group">
			@foreach ( $settings as $s )
				
				
						@if ( $s->type == 'checkbox' )
						<br />
						<div class="input-group">
						 	<span class="input-group-addon">
						 		<input name="{{ $s->key }}"  id="{{ $s->key }}" type="checkbox">
						 	</span>
						 	  	<input type="text" disabled="" value="{{ $s->name }}" class="form-control" style="cursor:default;">
						</div>
						@endif
						@if ( $s->type == 'text' )
						<br />
							<label for="{{ $s->key }}">{{ $s->name }}</label>
							<input type="{{ $s->type }}" class="form-control" id="{{ $s->key }}" placeholder="" value="{{ $s->value }}">
						@endif
			@endforeach
		</div>
	</div>
	
	<div class="box-footer">
		<p>{{ Form::submit('Update Settings', array('class' => 'btn btn-primary pull-right')) }}</p>
		<div class="clearfix clear"></div>
	</div>
{{ Form::close() }}
</div>

@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li class="active"><a href="../admin/settings"><i class="fa fa-cogs"></i> Settings</a></li>
		<li><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
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