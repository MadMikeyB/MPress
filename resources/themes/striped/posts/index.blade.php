@extends('layouts.app')

@section('content')
@can('create-post', Auth::user())
<div class="box alt">
	<div class="12u">
		<a href="/posts/create" class="button fit special" name="create_post">Write Something Beautiful</a>
	</div>
</div>
@endcan
@unless ( $posts->isEmpty() )
	@foreach ($posts as $post)
	<article class="box post post-excerpt">
		<header>
				<h2><a href="/read/{{$post->slug}}">{{ $post->title }}</a></h2>
				<p>posted by <span>@</span>{{ $post->user->name }}</small> on @datetime($post->created_at)</p>
		</header>
		<div class="info">
			<ul class="stats">
				<li><a href="/read/{{$post->slug}}#comments" class="icon fa-comment">{{ $post->comments->count() }}</a></li>
			</ul>
		</div>
		@if ( $post->image )
			<a href="/read/{{$post->slug}}" class="image featured"><img src="{{ $post->image }}" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}" /></a>
		@else
			<a href="/read/{{$post->slug}}" class="image featured"><img src="https://source.unsplash.com/category/nature/1600x900
" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}" /></a>
		@endif
		<p>{!! Markdown::convertToHtml(str_limit($post->content, 250)) !!}</p>
		<p><a class="button fit pull-right" href="/read/{{$post->slug}}">Read More</a></p>
	</article>
	@endforeach
@endunless

<div class="pagination">
	<a href="{{$posts->previousPageUrl() }}" class="button previous">Previous Page</a>
	<a href="{{$posts->nextPageUrl() }}" class="button next">Next Page</a>
</div>

@stop