@extends('layouts.app')

@section('content')
<div class="box">
	<div class="12u">
		@if ( $post->image )
			<span class="image fit"><img src="{{ $post->image }}" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}"></span>
		@endif
		<header>
			<h2>{{ $post->title }}</h2>
			<p><span>@</span>{{ $post->user->name }} on @datetime($post->created_at)</small></p>
		</header>

		{!! $post->content !!}
	</div>
</div>

<div class="box">
	<div class="12u">
		<h3>Comments on &ldquo;{{ $post->title }}&rdquo;</h3>
		
		@unless ( $post->comments->isEmpty() )
		@foreach ( $post->comments as $comment )
			{{-- Comment  --}}
			<cite><a href=""><span>@</span>{{ $comment->user->name }}</a></cite>
			<blockquote>
				<ul class="pull-right actions small">
					<li><a href="#reply" class="button fit small">Reply</a></li>
					@if ( $comment->user->id === Auth::user()->id )
					<li><a href="#" class="button fit small">Edit</a></li>
					<li><a href="#" class="button special fit small">Delete</a></li>
					@endif
				</ul>
				{!! Markdown::convertToHtml($comment->body) !!}
			</blockquote>
			{{-- / Comment --}}
		@endforeach
		@else 
			There are no comments! :(
		@endunless

	</div>
</div>

{{-- ------------- REPLY ------------- --}}
<div class="box">
	<div class="row uniform">
		<div class="12u">
			<header>
				<h3>Add Comment</h3>
			</header>
		</div>
	</div>

	<div class="row uniform" id="reply">
	    <div class="12u">
			<form action="/posts/{{ $post->slug }}/comments" method="POST" role="form">
				{{ csrf_field() }}
			<textarea name="body" id="body" class="form-control" rows="6" required="required" placeholder="
		        Waiting for your comment,
		        Anxious to hear what you say.
		        Hope to read it soon!
		    "></textarea>
		</div>
	</div>

    <div class="row uniform">
	    <div class="12u">
	    	<input type="submit" class="button fit" value="Reply">
		</div>
	</div>
</div>
@stop