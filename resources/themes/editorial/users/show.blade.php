@extends('layouts.app')

@section('content')
<section id="banner">
	<div class="content">
		<header>
			<h1>{{$user->name}}</h1>
			<p>Joined {{ $user->created_at->diffForHumans() }}
		</header>
		@if ( Auth::user() )
		<ul class="actions">
				<li><a href="#" class="button big">Follow</a></li>
    		<li><a href="#" class="button big">Messages</a></li>	
			@can('edit-user', $user)			
			<li><a href="&#64;{{ $user->slug }}/edit" class="button big special">Edit Profile</a></li>
			@endcan
    	</ul>
    	@endif
	</div>
</section>

<div class="box">
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
</div>
@stop
