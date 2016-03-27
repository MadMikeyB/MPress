@extends('emails.master')

@section('content')

<h1>Hey, {{ $post->user->name }}!</h1>
<p>We thought you'd like to know that there's been a new comment on &quot;{{ $post->title }}&quot;</p>

	<blockquote>
		<cite>{{ $comment->user->name }} said</cite>
		{!! Markdown::convertToHtml($comment->body) !!}
	</blockquote>

<p><a href="/read/{{ $post->slug }}#comment-{{$comment->id }}" class="btn btn-lg">Reply?</a></p>

@stop