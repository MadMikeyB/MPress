@extends('adminlayout')
@section('title', 'Dashboard')
@section('content')
@if ( !empty ( $flash ) )
{{ $flash }}
@endif
<h4 class="page-header">Admin Dashboard
<small>Site Statistics</small></h4>
@if ( $stats )
<div class="row">
	<div class="col-lg-4 col-xs-6">
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{ $stats['posts'] }}</h3>
                <p>Posts</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="/admin/posts/all" class="small-box-footer">
				All Posts <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-6">
		<div class="small-box bg-orange">
			<div class="inner">
				<h3>{{ $stats['pages'] }}</h3>
                <p>Pages</p>
			</div>
			<div class="icon">
				<i class="ion ion-paperclip"></i>
			</div>
			<a href="/admin/pages/all" class="small-box-footer">
				All Pages <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-4 col-xs-6">
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{ $stats['users'] }}</h3>
                <p>Authors</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="/admin/register" class="small-box-footer">
				All Authors <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>
@endif

@if ( $stats['mostpopularpost'] )
<div class="row">
	<!--  MOST POPULAR POST -->
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><a href="/article/{{$stats['mostpopularpost']->title_seo }}">{{ $stats['mostpopularpost']->title }}</a></h3>
				<div class="box-tools pull-right">
					<div class="label bg-red">Most Popular Post!</div>
				</div>
			</div>
			<div class="box-body">
				<p>{{ Str::limit($stats['mostpopularpost']->body, 500) }}</p>
			</div>
			<div class="box-footer">
				{{ $stats['mostpopularpost']->views }} views / <a href="/article/{{$stats['mostpopularpost']->title_seo }}">View Post <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</div>
@endif

<div class="row">
@if ( $stats['mostviewed'] )
	<!--  MOST VIEWED POSTS -->
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Most Viewed Posts</h3>
			</div>
			<div class="box-body">
				<ul>
					@foreach ( $stats['mostviewed'] as $p )
						<li><a href="/article/{{ $p->title_seo }}">{{ $p->title }}</a> with {{ $p->views }} views</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif

@if ( $posts )
	<!--  LATEST POSTS -->
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Latest Posts</h3>
			</div>
			<div class="box-body">
				<ul>
					@foreach ( $posts as $p )
					<li><a href="/article/{{ $p->title_seo }}">{{ $p->title }}</a> by {{ $p->author }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif
</div>

<div class="row">
@if ( $pages )
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Latest Pages</h3>
			</div>
			<div class="box-body">
				<ul>
					@foreach ( $pages as $p )
					<li><a href="/{{ $p->slug }}">{{ $p->title }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif

@if ( $stats['mostactiveauthor'] )
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Most Active Author</h3>
			</div>
			<div class="box-body">
				<p>{{ $stats['mostactiveauthor']->author }}</p>
			</div>
		</div>
	</div>
@endif
</div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li class="active"><a href="../admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="../admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="../admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="../admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="../admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="../admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="../admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="../admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="../admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop