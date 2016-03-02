@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@unless ( $posts->isEmpty() )
		@foreach ($posts as $post)
			<div class="col-md-6">
				<div class="thumbnail">
					@if ( $post->image )
					<img src="{{ $post->image }}" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}">
					@endif
					<div class="caption">
						<h3>{{ $post->title }} <small><span>@</span>{{ $post->user->name }}</small></h3>
						<p>{!! Markdown::convertToHtml(str_limit($post->content, 140)) !!}</p>
						<p><a href="/read/{{ $post->slug }}" class="btn btn-primary" role="button">Read More</a></p>

					</div>
				</div>
			</div>
		@endforeach
		@else
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">Uh Oh..</h2>
			</div>
			<div class="panel-body">
				There are no posts!
			</div>
			<div class="panel-footer">
				<a class="btn btn-primary btn-block" href="/posts/create">Start Writing</a>
			</div>
		</div>
		@endunless
	</div>
</div>

<div class="container">
	<div class="row center-block">
		<div class="col-md-12">
			{!! $posts->links() !!}
		</div>
	</div>
</div>



@stop