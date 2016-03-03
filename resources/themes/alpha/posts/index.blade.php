@extends('layouts.app')

@section('content')
<div class="box alt">
	<div class="12u">
		<a href="/posts/create" class="button fit special">Write Something Beautiful</a>
	</div>
</div>

<div class="row">
	@unless ( $posts->isEmpty() )
	@foreach ($posts as $post)
	<div class="6u 12u(narrower)">
		<section class="box special">
			@if ( $post->image )
			<span class="image featured"><img src="{{ $post->image }}" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}"></span>
			@endif
			<header>
				<h3><a href="/read/{{$post->slug}}">{{ $post->title }}</a></h2>
				<p>posted by <span>@</span>{{ $post->user->name }}</small> on @datetime($post->created_at)</p>
			</header>

			{!! Markdown::convertToHtml(str_limit($post->content, 140)) !!}

			<a class="button fit" href="/read/{{$post->slug}}">Read More</a>
		</section>
	</div>
	@endforeach
	@endunless
</div>

<div class="box alt">
	<div class="12u">
			{!! $posts->links() !!}
	</div>
</div>





@stop