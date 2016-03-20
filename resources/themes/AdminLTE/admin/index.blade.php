@inject('stats', 'App\Services\Stats')
@inject('comments', 'App\Comment')

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

<div class="row">
	<div class="col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-maroon"><i class="fa fa-pencil-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Viewed Post</span>
				<span><a href="">Download MPress Today!</a></span>
				<span class="info-box-number">1,337 views</span>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Viewed Page</span>
				<span><a href="">About Me</a></span>
				<span class="info-box-number">1,337 views</span>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Active Author</span>
				<span><a href="">@Mikey</a></span>
				<span class="info-box-number">52 posts</span>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-blue"><i class="fa fa-comments"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Commented Post</span>
				<span><a href="">Download MPress Today</a></span>
				<span class="info-box-number">190 comments</span>
			</div>
		</div>
	</div>
</div>

@unless ( $comments->all()->isEmpty() )
<div class="row">
	<div class="col-md-12">
		<div class="box box-default color-palette-box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-comments"></i> Recent Comments</h3>
			</div>
			<div class="box-body">
				@foreach ( $comments->all() as $comment )
				<blockquote>
					<div class="btn-group pull-right">
						<a class="btn btn-sm btn-success" href="/read/{{ $comment->post->slug }}#comment-{{ $comment->id }}" role="button"><i class="fa fa-eye"></i></a>
						<a class="btn btn-sm btn-primary" href="/comments/{{ $comment->id }}/edit" role="button"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-sm btn-danger" href="/comments/{{ $comment->id }}/delete" role="button"><i class="fa fa-trash"></i></a>
					</div>
					<p>{!! Markdown::convertToHtml( $comment->body ) !!}</p>
					<small>{{ $comment->user->name }} on <cite title="{{ $comment->post->title }}"><a href="/read/{{ $comment->post->slug }}">{{ $comment->post->title }}</a></cite></small>
				</blockquote>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endunless

@stop