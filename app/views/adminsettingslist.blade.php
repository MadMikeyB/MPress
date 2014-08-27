@extends('adminlayout')
@section('title', 'Settings')
@section('content')

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">MPress Settings</h3>
	</div>
	
	<div class="box-body">
		<div class="form-group">
			@foreach ( $settings as $s )
				
				
						@if ( $s->type == 'checkbox' )
						<div class="{{ $s->type }}">
							<label class="" for="{{ $s->key }}">
							<input type="checkbox" id="{{ $s->key }}" @if ( $s->value == '1')checked@endif>
								{{ $s->name }}
							</label>
						</div>
						@endif
						@if ( $s->type == 'text' )
							<label for="{{ $s->key }}">{{ $s->name }}</label>
							<input type="{{ $s->type }}" class="form-control" id="{{ $s->key }}" placeholder="" value="{{ $s->value }}">
						@endif
			@endforeach
		</div>
	</div>
	
	<div class="box-footer clearfix no-border">
		<button class="btn btn-success pull-right">Update Settings</button>
	</div>
</div>

@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="/admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li class="active"><a href="/admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop