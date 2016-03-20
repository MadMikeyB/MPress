@extends('layouts.app_alt')

@section('hero')

							<div class="7u 12u(medium)">
								<h2>{{$user->name}}</h2>
								<p>Member since @datetime($user->created_at)</p>
							</div>
							<div class="5u 12u(medium)">
								<ul>
									<li><a href="#" class="button big icon fa-arrow-circle-right">Follow</a></li>
									<li><a href="#" class="button big icon fa-envelope">Message</a></li>
									<li><a href="&#64;{{ $user->slug }}/edit" class="button alt big icon fa-pencil">Edit Profile</a></li>
								</ul>
							</div>
@stop

@section('content')

<section class="">
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
