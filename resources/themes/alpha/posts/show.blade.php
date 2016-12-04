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
		
		@unless ( $post->images->isEmpty() )
		<span class="image featured">
			@foreach ( $post->images as $image )
				<a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
			@endforeach
		</span>
		@endunless

				<ul class="pull-right actions small">
					@can( 'edit-post', $post)
					<li><a href="/posts/{{ $post->slug }}/edit" class="button fit small">Edit</a></li>
					@endcan

					@can('delete-post', $post)
					<form action="/posts/{{ $post->slug }}/delete" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<li><input type="submit" class="button special fit small" value="Delete"></li>
					</form>
					@endcan
				</ul>
	</div>
</div>



@can( 'edit-post', $post)
	@if ( $post->images->isEmpty() )
		<div class="box">
			<div class="12u">
				<h2>Hey! You can add images to this post!</h2>
				<form class="dropzone" action="/posts/{{$post->slug}}/images">
					{{ csrf_field() }}
					<div class="fallback">
						<input name="image" type="file" multiple />
					</div>
				</form>
			</div>
		</div>
	@endif
@endcan

<div class="box" id="comments">
	<div class="12u">
		<h3>Comments on &ldquo;{{ $post->title }}&rdquo;</h3>
		
		@unless ( $post->comments->isEmpty() )
		@foreach ( $post->comments as $comment )
			{{-- Comment  --}}
			@if ( $comment->user )
			<cite id="comment-{{ $comment->id }}"><a href="/&#64;{{$comment->user->slug}}"><span>@</span>{{ $comment->user->name }}</a></cite>
			@else
			<cite id="comment-{{ $comment->id }}">Guest Commenter</cite>
			@endif
			<blockquote>
				<ul class="pull-right actions small">
					@can( 'create-comment', $comment)
					<li><a href="#reply" class="button fit small">Reply</a></li>
					@endcan

					@can( 'edit-comment', $comment)
					<li><a href="/comments/{{ $comment->id }}/edit" class="button fit small">Edit</a></li>
					@endcan

					@can('delete-comment', $comment)
					<form action="/comments/{{ $comment->id }}/delete" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<li><input type="submit" class="button special fit small" value="Delete"></li>
					</form>
					@endcan
				</ul>
				{!! $comment->body !!}
			</blockquote>
			{{-- / Comment --}}
		@endforeach
		@else 
			There are no comments! :(
		@endunless

	</div>
</div>

@if ( env('ALLOW_GUEST_COMMENTS') == '1')
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
			@if ( Auth::guest() )
			<div class="field">
				<input type="text" class="form-control" name="name" id="name" required="required" placeholder="Your name">
			</div>
			@endif
			<div class="field">
				<textarea name="body" id="body" class="form-control" rows="6" required="required" placeholder="
Waiting for your comment,
Anxious to hear what you say.
Hope to read it soon!
			    "></textarea>
		    </div>
		</div>
	</div>

    <div class="row uniform">
	    <div class="12u">
	    	<input type="submit" class="button fit" value="Reply">
		</div>
	</div>
</div>
@else
@can('create-comment', $post)
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
@endcan
@endif

@stop


@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" property="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@stop