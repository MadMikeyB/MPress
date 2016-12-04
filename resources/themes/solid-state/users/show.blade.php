@extends('layouts.app_alt')

@section('hero')

				<section id="banner">
					<div class="inner">
						<h2>{{$user->name}}</h2>
						<p>Member for {{ $user->created_at->diffForHumans() }}</p>
						@if ( Auth::user() )
						<ul class="actions">
							<li><a href="#" class="button small special">Follow</a></li>
							<li><a href="#" class="button small ">Message</a></li>
							@can('edit-user', $user)
							<li><a href="&#64;{{ $user->slug }}/edit" class="button small special">Edit Profile</a></li>
							@endcan
						</ul>
						@endif
					</div>
				</section>
@stop

@section('content')

<section class="box">
	<header class="row">
		<div class="6u 12u(narrower)">
			<h3>{{ $user->name }}'s Posts</h3>
			<ul>
			@foreach ( $user->posts as $post )
				<li><a href="{{ url('read', $post->slug) }}">{{ $post->title }}</a></li>
			@endforeach
			</ul>
		</div>
		<div class="6u 12u(narrower)">
			<h3>{{ $user->name }}'s Comments</h3>
			@foreach ( $user->comments as $comment )
				<cite><a href="{{ url('read', $comment->post->slug) }}">{{ $comment->post->title }}</a></cite>
				<blockquote>{!! Markdown::convertToHtml(str_limit($comment->body, 80)) !!}</blockquote>
			@endforeach
		</div>
	</header>
</section>

@stop
