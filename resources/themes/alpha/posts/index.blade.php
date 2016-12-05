@extends('layouts.app')

@section('content')
@can('create-post', Auth::user())
<div class="box alt">
	<div class="12u">
		<a href="/admin/posts/create" class="button fit special" name="create_post">Write Something Beautiful</a>
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
					<a href="/{{ $post->images()->first()->image_path }}" target="_blank"><img src="/{{ $post->images()->first()->image_path }}" style="max-width: 100%;" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
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
		<ul class="pagination">
			{!! $posts->links() !!}
		</ul>
	</div>
</div>





@stop