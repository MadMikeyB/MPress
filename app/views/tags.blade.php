@extends('layout')
@section('title', 'Tags for ' . $tag)
@section('content')
	<h1>Results for &ldquo;{{ $tag }}&rdquo;</h1>
	<ul class="archives">
	@if ( $tags )
	@foreach ($tags as $_tag)
		<li>
			<small class="timeago">{{ DateController::showTimeAgo($_tag->created_at) }}</small> &mdash; {{ HTML::link('article/'.$_tag->post->title_seo, $_tag->post->title, array( 'title' => $_tag->post->title, 'datetime' => $_tag->post->created_at ) ) }} 
		</li>
	@endforeach
	@endif
	</ul>
	<div class="clear clearfix"></div>
	{{ $tags->links('pagination_normal') }}
	<script>
	jQuery(document).ready(function() {
		  jQuery("small.timeago").timeago();
	});
	</script>
@stop