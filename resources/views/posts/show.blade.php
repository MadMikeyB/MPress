@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="thumbnail">
				@if ( $post->image )
				<img src="{{ $post->image }}" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}">
				@endif
				<div class="caption">
					<h3>{{ $post->title }} <small><span>@</span>{{ $post->user->name }}</small></h3>
					<p>{!! $post->content !!}</p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Comments</h3>
				</div>
				@unless ( $post->comments->isEmpty() )
				@foreach ( $post->comments as $comment )
				{{-- Comment  --}}
				<div class="panel-body">
					<cite><span>@</span>{{ $comment->user->nickname }}</cite>
					<blockquote>
						&ldquo;{{ $comment->body }}&rdquo;
					</blockquote>
				</div>
				<div class="panel-footer clearfix">
					<div class="pull-right btn-group">
						<a href="#reply" class="btn btn-xs btn-primary">Reply</a>
						<a href="" class="btn btn-xs btn-default">Edit</a>
						<a href="" class="btn btn-xs btn-danger">Delete</a>
					</div>
				</div>
				{{-- / Comment --}}
				@endforeach
				@else 
					<div class="panel-body">
						There are no comments! :(
					</div>
				@endunless
			</div>
			
			{{-- ------------- REPLY ------------- --}}
			<div class="panel panel-default" id="reply">
				<div class="panel-heading">
					<h3 class="panel-title">Add Comment</h3>
				</div>

				<form action="/read/{{ $post->slug }}" method="POST" role="form">
					{{ csrf_field() }}
					<div class="panel-body">
							<div class="form-group">
								<textarea name="comment" id="comment" class="form-control" rows="6" required="required" placeholder="
        Waiting for your comment,
        Anxious to hear what you say.
        Hope to read it soon!
    "></textarea>
							</div>					
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-right btn-group">
							<input type="submit" class="btn btn-block btn-primary" value="Reply">
						</div>
					</div>
				</form>
				{{-- ------------- /REPLY ------------- --}}
			</div>



		</div>
	</div>
</div>
@stop