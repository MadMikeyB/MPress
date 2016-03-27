<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{ Setting::get('site_title', 'MPress 2.0') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{Theme::asset('js/ie/html5shiv.js', null, true) }}"></script><![endif]-->
		<link rel="stylesheet" href="{{Theme::asset('css/main.css', null, true) }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{{Theme::asset('css/ie8.css', null, true) }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{Theme::asset('css/ie9.css', null, true) }}" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="/">{{ Setting::get('site_title', 'MPress 2.0') }}</a></h1>
					<nav id="nav">
						<ul>
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
						</ul>
					</nav>
				</header>

						@if ( Request::is('/') )
			<!-- Banner -->
				<section id="banner">
					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner">
						<header>
							<h2>{{Setting::get('site_title', 'MPress 2.0')}}</h2>
						</header>
						<p>{{ Setting::get('site_description', 'Best. MPress. Yet') }}</p>
					</div>
				</section>
				@endif
			<!-- Main -->
			<article id="main">
				<section class="wrapper style3 container special">

				    @include('partials.layout.flashmessage')
				    @include('partials.layout.errors')
					@yield('content')

				</section>
			</article>
			
			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="http://twitter.com/{{ Setting::get('social_twitter') }}" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="http://facebook.com/{{ Setting::get('social_facebook') }}" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="http://plus.google.com/u/{{ Setting::get('social_google') }}" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
						<li><a href="http://github.com/{{ Setting::get('social_github') }}" class="icon circle fa-github"><span class="label">Github</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="{{Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/jquery.dropotron.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/jquery.scrolly.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/jquery.scrollgress.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{Theme::asset('js/main.js', null, true) }}"></script>
			@yield('scripts')

	</body>
</html>