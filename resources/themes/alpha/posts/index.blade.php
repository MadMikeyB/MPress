@extends('layouts.app')

@section('content')
@can('create-post', Auth::user())
<div class="box alt">
	<div class="12u">
		<a href="/posts/create" class="button fit special" name="create_post">Write Something Beautiful</a>
	</div>
</div>
@endcan

<div class="row">
	@unless ( $posts->isEmpty() )
	@foreach ($posts as $post)
	<div class="6u 12u(narrower)">
		<section class="box special">
			@unless ( $post->images->isEmpty() )
				<span class="image featured">
					@foreach ( $post->images as $image )
						<a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
					@endforeach
				</span>
			@endunless
			<header>
				<h3><a href="/read/{{$post->slug}}">{{ $post->title }}</a></h2>
				<p>posted by <span>@</span>{{ $post->user->name }}</small> on @datetime($post->created_at)</p>
			</header>

			{!! Markdown::convertToHtml(strip_tags(str_limit($post->content, 140))) !!}

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