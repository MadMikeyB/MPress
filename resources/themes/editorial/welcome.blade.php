@extends('layouts.app')

@section('content')
		<section id="banner">
			<div class="content">
				<header>
					<h1>{{ $post->title }}</h1>
				</header>
				{!! Markdown::convertToHtml(str_limit($post->content, 1337)) !!}
				<ul class="actions">
 				<li><a href="/read/{{ $post->slug }}" class="button big">Read More</a></li>
            	<li><a href="/read/{{ $post->slug }}#comments" class="button alt big">Share Your Thoughts</a></li>				</ul>
			</div>
		</section>
    @unless ( $posts->isEmpty() )
    </section> <!-- / section#main.container -->
    <section id="cta" style="text-align:center; padding: 1.5em 0 1em 0;">
        <h2>Latest Posts</h2>
        <p><a href="/posts" class="button alt">Read All</a></p>
    </section>
	<section>
		<header class="major">
			<h2>Featured Posts</h2>
		</header>
		<div class="posts">
		@foreach ( $posts as $post)
			<article>
					@unless ( $post->images->isEmpty() )
                    @foreach ( $post->images as $image )
                        <a href="/{{$image->image_path}}" target="_blank" class="image"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
                    @endforeach
                @endunless
				<h3>{{ $post->title }}</h3>
                <p>{!! Markdown::convertToHtml(strip_tags(str_limit($post->content, 155))) !!}</p>
				<ul class="actions">
					 <li><a href="/read/{{ $post->slug }}" class="button alt">Read More</a></li>
				</ul>
			</article>
		@endforeach
		</div>
	</section>
    @endunless
@endsection
