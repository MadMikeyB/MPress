@inject('stats', 'App\Services\Stats')
@inject('comments', 'App\Comment')
@inject('posts', 'App\Post')
@inject('pages', 'App\Page')

@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}} &mdash; What's going on?
            <small>At a Glance</small>
          </h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-3 col-sm-6">
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
	<div class="col-md-3 col-sm-6">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ $stats->countFrom('App\Page') }}</h3>
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
	<div class="col-md-3 col-sm-6">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{ $stats->countFrom('App\User') }}</h3>
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
	<div class="col-md-3 col-sm-6">
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>{{ $stats->countFrom('App\Comment') }}</h3>
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
	@unless ( $posts->all()->isEmpty() )
	<div class="col-md-3 col-sm-6">
		<div class="info-box">
			<span class="info-box-icon bg-maroon"><i class="fa fa-pencil-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Viewed Post</span>
				<span><a href="{{ url('/read/' . $stats->most( 'App\Post', 'views' )->slug) }}">{{ $stats->most( 'App\Post', 'views' )->title }}</a></span>
				<span class="info-box-number">{{ $stats->most( 'App\Post', 'views' )->views }} views</span>
			</div>
		</div>
	</div>
	@endunless

	@unless ( $pages->all()->isEmpty() )
	<div class="col-md-3 col-sm-6">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Viewed Page</span>
				<span><a href="{{ url('/' . $stats->most( 'App\Page', 'views' )->slug) }}">{{ $stats->most( 'App\Page', 'views' )->title }}</a></span>
				<span class="info-box-number">{{ $stats->most( 'App\Page', 'views' )->views }} views</span>
			</div>
		</div>
	</div>
	@endunless

	@unless ( $posts->all()->isEmpty() )
	<div class="col-md-3 col-sm-6">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Active Author</span>
				<span><a href="&#64;{{ $stats->most( 'App\Post', 'author_id' )->user->slug }}">{{ $stats->most( 'App\Post', 'author_id' )->user->name }}</a></span>
				<span class="info-box-number">{{ $stats->most( 'App\Post', 'author_id' )->count }} posts</span>
			</div>
		</div>
	</div>
	@endunless
	@unless ( $comments->all()->isEmpty() )
	<div class="col-md-3 col-sm-6">
		<div class="info-box">
			<span class="info-box-icon bg-blue"><i class="fa fa-comments"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Commented Post</span>
				<span><a href="/read/{{ $stats->most( 'App\Comment', 'post_id' )->post->slug }}">{{ $stats->most( 'App\Comment', 'post_id' )->post->title }}</a></span>
				<span class="info-box-number">{{ $stats->most( 'App\Comment', 'post_id' )->count }} comments</span>
				{{-- <span>There are no comments, yet!</span> --}}
			</div>
		</div>
	</div>
	@endunless
</div>

@unless ( $comments->all()->isEmpty() )
<div class="row">
	<div class="col-md-12">
		<div class="box box-default color-palette-box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-comments"></i> Latest 
				@if ( $comments->count() < 5)
					{{ $comments->count() }}
				@else 
					5
				@endif
				Comments</h3>
			</div>
			<div class="box-body">
				@foreach ( $comments->paginate(5) as $comment )
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