@inject('stats', 'App\Services\Stats')

@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}} &mdash; What's going on?
            <small>At a Glance</small>
          </h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="small-box bg-maroon">
			<div class="inner">
				<h3>{{ $stats->countFrom('App\Post') }}</h3>
                <p>Posts</p>
			</div>
			<div class="icon">
				<i class="fa fa-pencil-square-o"></i>
			</div>
			<a href="/admin/posts" class="small-box-footer">
				All Posts <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ $stats->count('page') }}</h3>
                <p>Pages</p>
			</div>
			<div class="icon">
				<i class="fa fa-file"></i>
			</div>
			<a href="/admin/pages" class="small-box-footer">
				All Pages <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{ $stats->count('user') }}</h3>
                <p>Authors</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="/admin/users" class="small-box-footer">
				All Authors <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>{{ $stats->count('comment') }}</h3>
                <p>Comments</p>
			</div>
			<div class="icon">
				<i class="fa fa-comments"></i>
			</div>
			<a href="/admin/comments" class="small-box-footer">
				All Comments <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Admin Control Panel Features</h3>
					<ul>
					<li>Force Delete from Admin Control Panel</li>
					<li>Restore Content from Admin Control Panel</li>
					<li>Settings using <code>Setting::set();</code></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Admin Dashboard</h3>
					<ul>
						<li>Most Viewed Posts</li>
						<li>Most Viewed Pages</li>
						<li>Most Active Author</li>
						<li>Recent Comments</li>
						<li>Most Commented Post</li>
					</ul>
			</div>
		</div>
	</div>		
</div>
@stop