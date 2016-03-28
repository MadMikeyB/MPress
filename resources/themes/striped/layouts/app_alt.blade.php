@inject('comments', 'App\Comment')
@inject('posts', 'App\Post')

<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		{!! SEO::generate() !!}
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/html5shiv.js', null, true) }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ Theme::asset('css/main.css', null, true) }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ Theme::asset('css/ie8.css', null, true) }}" /><![endif]-->
	</head>
	<body>

		<!-- Content -->
			<div id="content">
				<div class="inner">
					<article class="box post post-excerpt">
							<header>
								@yield('hero')
							</header>
					</article>

				    @include('partials.layout.flashmessage')
				    @include('partials.layout.errors')

					@yield('content')

				</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="/">{{ Setting::get('site_title', 'MPress 2.0')}}</a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
						</ul>
					</nav>

				@unless ( $posts->all()->isEmpty() )
				<!-- Recent Posts -->
					<section class="box recent-posts">
						<header>
							<h2>Recent Posts</h2>
						</header>

						<ul>
							@foreach ( $posts->orderBy('id', 'DESC')->paginate('5') as $post )
							<li><a href="/read/{{ $post->slug }}">{{ $post->title }}</a></li>
							@endforeach
						</ul>
					</section>
				@endunless
				
				@unless ( $comments->all()->isEmpty() )
				<!-- Recent Comments -->
					<section class="box recent-comments">
						<header>
							<h2>Recent Comments</h2>
						</header>

						<ul>
						@foreach ( $comments->orderBy('id', 'DESC')->paginate('5') as $comment )
							<li>{{ $comment->user->name }} on <cite title="{{ $comment->post->title }}"><a href="/read/{{ $comment->post->slug }}">{{ $comment->post->title }}</a></cite></li>
						@endforeach
						</ul>
					</section>
				@endunless

				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="{{ Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>
			@yield('scripts')
	</body>
</html>