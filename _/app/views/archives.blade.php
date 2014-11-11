@extends('layout')
@section('title', 'Archives')
@section('content')
	<h1>Recent Posts</h1>
	<ul class="archives">
	@foreach ($posts as $post)
		<li>
			<small class="timeago">{{ DateController::showTimeAgo($post->created_at) }}</small> &mdash; {{ HTML::link('article/'.$post->title_seo, $post->title, array( 'title' => $post->title, 'datetime' => $post->created_at ) ) }} 
		</li>
	@endforeach
	</ul>
	<script>
	jQuery(document).ready(function() {
		  jQuery("small.timeago").timeago();
	});
	</script>
@stop