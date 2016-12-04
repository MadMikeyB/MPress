@extends('layouts.app')

@section('content')
    <section class="box special">
        <header class="major">
            <h2>{{ $post->title }}</h2>
         </header>
            <article style="text-align:left !important;">{!! Markdown::convertToHtml(str_limit($post->content, 1337)) !!}</article>
{{--         @unless ( $post->images->isEmpty() )
        <span class="image featured">
            @foreach ( $post->images as $image )
                <a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
            @endforeach
        </span>
        @endunless --}}
        <ul class="actions">
            <li><a href="/read/{{ $post->slug }}#comments" class="button alt">Share Your Thoughts</a></li>
        </ul>
    </section>
    @unless ( $posts->isEmpty() )
    </section> <!-- / section#main.container -->
	
	<section class="wrapper alt spotlight style10">
		<div class="inner">
			<div class="content" style="text-align:center !important;">
				<h2 class="major">Latest Posts</h2>
        		<p><a href="/posts" class="special">Read All</a></p>
			</div>
		</div>
	</section>

    <section id="main" class="wrapper style1">
        <div class="inner">
        <section class="features">
            @foreach ( $posts as $post)
            <article>
                    @unless ( $post->images->isEmpty() )
                    <span class="image featured">
                        @foreach ( $post->images as $image )
                            <a href="/{{$image->image_path}}" class="image" target="_blank">
                            	<img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}">
                            </a>
                        @endforeach
                    </span>
                    @endunless
                    <h3 class="major">{{ $post->title }}</h3>
                    <p>{!! Markdown::convertToHtml(strip_tags(str_limit($post->content, 155))) !!}</p>
                    <a href="/read/{{ $post->slug }}" class="special">Read More</a>
            </article>
            @endforeach
		</section>
        </div>
    </section>
    @endunless
@endsection
