@extends('layouts.app')

@section('content')

@can('create-comment', $comment)
{{-- ------------- REPLY ------------- --}}
<div class="box">
	<div class="row uniform">
		<div class="12u">
			<header>
				<h3>Update Comment By {{ $comment->user->name }} on &ldquo;{{ $comment->post->title }}&rdquo;</h3>
			</header> 
		</div>
	</div>

	<div class="row uniform" id="reply">
	    <div class="12u">
			<form action="/comments/{{ $comment->id }}" method="POST" role="form">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
			<textarea name="body" id="body" class="form-control" rows="6" required="required">{{ $comment->body }}</textarea>
		</div>
	</div>

    <div class="row uniform">
	    <div class="12u">
	    	<input type="submit" class="button fit" value="Update Comment">
		</div>
	</div>
</div>
@endcan

@stop