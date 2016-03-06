@extends('layouts.app')

@section('content')
@can('create-post', Auth::user())
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a type="button" class="btn btn-primary btn-block btn-xl" href="/posts/create">Write Something Beautiful</a>
		</div>
	</div>
</div>
@endcan


<div class="container with-padding">
	<div class="row">
		@unless ( $posts->isEmpty() )
		@foreach ($posts as $post)
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>{{ $post->title }} <small class="pull-right badge"><span>@</span>{{ $post->user->name }}</small></h3>
					</div>
					<div class="panel-body">
							@if ( $post->image )
							<img src="{{ $post->image }}" alt="{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}">
							@endif
							<div class="caption">
								<p>{!! Markdown::convertToHtml(str_limit($post->content, 140)) !!}</p>
							</div>
					</div>
					<div class="panel-footer">
						<p><a href="/read/{{ $post->slug }}" class="btn btn-primary btn-block" role="button">Read More</a></p>
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