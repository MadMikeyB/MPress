@extends('layout')
@section('title', 'Welcome')
@section('content')
@if ( $post )
<div class="blog-post">
	<h1 class="blog-post-title">{{ HTML::link('article/' . $post->title_seo, $post->title) }}</h1>
	@if ( $post->created_at != '0000-00-00 00:00:00' )
		<p class="blog-post-meta"><time datetime="{{ $post->created_at }}">{{ DateController::showTimeAgo($post->created_at) }}</time> by <a href="/author/{{ $post->author }}">{{ $post->author }}</a>
	@endif
	<p>
	@if ( $post->image )
	<a class="pull-right" href="/article/{{ $post->title_seo }}">
		<img class="media-object" data-src="holder.js/300x200" alt="300x200" src="{{ $post->image }}" style="width: 300px; height: 200px;">
	</a>
	@endif
	{{ $post->body }}
	</p>
</div>
@if ( $post->comments == 1 )
<p class="right">{{ HTML::link('article/' . $post->title_seo, 'Add a Comment &rarr;') }}</p>
@endif

@endif

	
@stop

@section('sidebar')
<nav>
	@if ( $posts )
	<ul class="blogroll list-unstyled">
		<li class="header"><h3>Recent Posts</h3></li>
	@foreach ($posts as $post)
		<li>
			{{ HTML::link('article/'.$post->title_seo, $post->title, array( 'title' => $post->title, 'datetime' => $post->created_at ) )}} <!--   &mdash; <small>{{ $post->created_at }}</small> -->
		</li>
	@endforeach
		<li class="header pull-right"><h4>{{ HTML::link('archives', 'Archives &rarr;') }}</h4></li>
	</ul>
	<div class="clear clearfix"></div>
	@endif
	
	@if ( $popular )
	<ul class="blogroll list-unstyled">
		<li class="header"><h3>Popular Posts</h3></li>
	@foreach ($popular as $post)
		<li>
			{{ HTML::link('article/'.$post->title_seo, $post->title, array( 'title' => $post->title, 'datetime' => $post->created_at ) )}} &middot; <small>{{ $post->views }} hits</small>  <!--   &mdash; <small>{{ $post->created_at }}</small> -->
		</li>
	@endforeach
	</ul>
	@endif
	
	<ul class="sitefriends list-unstyled">
		<li class="header"><h3>Site Friends</h3></li>
		<!--  TODO MAKE FOREACH -->
		<li><a href="http://30daychallenges.net" rel="me" target="_blank">30 Day Challenges</a></li>
		<li><a href="http://chroder.com" rel="friend" target="_blank">Chroder</a></li>
		<li><a href="http://mrfloris.com" rel="friend" target="_blank">MrFloris.com</a></li>
		<li><a href="http://offtopichut.com" rel="me" target="_blank">Off Topic Hut</a></li>
		<li><a href="http://thegeekdistrict.com" rel="me" target="_blank">The Geek District</a></li>
	</ul>
	
	<ul class="fb list-unstyled">
		<li><div class="fb-activity" data-app-id="{{-- $settings->fbappid --}}" data-width="{{-- $settings->fbappwidth --}}" data-height="{{-- $settings->fbappheight --}}" data-header="{{-- $settings->fbappheader --}}" data-font="{{-- $settings->fbappfont --}}" data-recommendations="{{-- $settings->fbappreccommendations --}}"></div></li>
	</ul>
</nav>

@stop