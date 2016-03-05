@extends('layouts.app')

@section('content')
<div class="box">
	<h3>Update &ldquo;{{ $post->title }}&rdquo;</h3>
	<form action="/posts/{{$post->slug}}" method="post" role="form">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<div class="row uniform 50%">
			<div class="12u">
				<input id="title" name="title" placeholder="I want to talk about..." value="{{ $post->title }}" required="" type="text">
			</div>
		</div>

		<div class="row uniform 50%">
			<div class="12u">
				<textarea id="content" name="content" required="" rows="12">{{ $post->content }}</textarea>
			</div>
		</div>

		<div class="row uniform">
			<div class="12u">
				<input class="special fit" type="submit" value="Update">
			</div>
		</div>
	</form>
</div>
@stop