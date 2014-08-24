@extends('layout')
@section('title', $post->title)
@section('content')
<div class="blog-post">
	<h1 class="blog-post-title">{{ $post->title }}</h1>
 		@if ( $post->created_at != '0000-00-00 00:00:00' )
		<p class="blog-post-meta"><time datetime="{{ $post->created_at }}">{{ DateController::showTimeAgo($post->created_at) }}</time> by <a href="/author/{{ $post->author }}">{{ $post->author }}</a>
		@endif
 		<p>
	 	@if ( $post->image )
		<a class="pull-right" href="/article/{{ $post->title_seo }}">
			<img class="media-object" data-src="holder.js/300x200" alt="300x200" src="{{ $post->image }}" style="width: 300px; height: 200px;">
		</a>
		@endif
		{{ nl2br( $post->body ) }}
		</p>
</div>

<div class="clear clearfix"></div>
{{-- @if ( $settings->display_shorturl == '1' ) --}}
<p style="float:right"><b>Share:</b> {{ HTML::link('s/' . $post->share_id) }}</p>
{{-- @endif --}}
<p>{{ HTML::link('/', '&larr; Back to index.') }}</p>

{{-- @if ( $settings->display_sharelinks == '1' ) --}}
<div class="shareStrip">
 	<a class="dp-att" href="https://tools.digitalpoint.com/social-buttons">Social Buttons</a>
	<script>(function(d,u){var a=d.createElement("script");a.async=1;a.src="//x.dpstatic.com/social.js?u="+encodeURIComponent(u)+"&r=MadMikeyB";d.querySelector("head").appendChild(a)})
(document,window.location.href);</script>
 </div>
{{-- @endif --}}
 

@if ( !Auth::guest() )
<div class="clear clearfix"></div><hr />
<div class="moderation">
	<nav>
		<ul>
			<li>{{ HTML::link('edit/' . $post->title_seo, 'Edit') }}</li>
			<li>{{ HTML::link('delete/' . $post->title_seo, 'Delete') }}</li> 
			<li>{{ HTML::link('lock/' . $post->title_seo, 'Lock') }}</li>
		</ul>
	</nav>
</div>
<div class="clear clearfix"></div>
@endif
<hr />
@if ( $post->comments == 1 )
<div class="comments">
<div class="fb-comments" data-href="http://{{-- $settings->site_url --}}{{ $_SERVER['HTTP_HOST'] }}/article/{{ $post->title_seo }}" data-width="580" data-num-posts="10"></div>
</div>
@endif

@stop

@section('sidebar')
<nav>
	<ul class="sitefriends">
		<li class="header"><h3>Site Friends</h3></li>
		<!--  TODO MAKE FOREACH -->
		<li><a href="http://30daychallenges.net" rel="me" target="_blank">30 Day Challenges</a></li>
		<li><a href="http://chroder.com" rel="friend" target="_blank">Chroder</a></li>
		<li><a href="http://mrfloris.com" rel="friend" target="_blank">MrFloris.com</a></li>
		<li><a href="http://offtopichut.com" rel="me" target="_blank">Off Topic Hut</a></li>
		<li><a href="http://thegeekdistrict.com" rel="me" target="_blank">The Geek District</a></li>
	</ul>
	
	<ul>
		<li><div class="fb-activity" data-app-id="128735053915709" data-width="300" data-height="300" data-header="false" data-font="verdana" data-recommendations="true"></div></li>
	</ul>
</nav>

@stop