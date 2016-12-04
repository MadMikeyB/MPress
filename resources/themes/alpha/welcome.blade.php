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
    <section id="cta" style="padding: 1.5em 0 1em 0;">
        <h2>Latest Posts</h2>
        <p><a href="/posts" class="button alt">Read All</a></p>
    </section>

    <section id="main" class="container">
        <div class="row">
            @foreach ( $posts as $post)
            <div class="6u 12u(narrower)">
                <section class="box special">
                    @unless ( $post->images->isEmpty() )
                    <span class="image featured">
                        @foreach ( $post->images as $image )
                            <a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
                        @endforeach
                    </span>
                    @endunless
                    <h3>{{ $post->title }}</h3>
                    <p>{!! Markdown::convertToHtml(strip_tags(str_limit($post->content, 155))) !!}</p>
                    <ul class="actions">
                        <li><a href="/read/{{ $post->slug }}" class="button alt">Read More</a></li>
                    </ul>
                </section>
            </div>
            @endforeach
        </div>
    </section>
    @endunless
@endsection
