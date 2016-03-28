<!DOCTYPE HTML>
<!-- skel-baseline v3.0.1 | (c) n33 | skel.io | MIT licensed -->
<html>
	<head>
		{!! SEO::generate() !!}
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ Theme::asset('css/main.css', null, true) }}" />
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
				<h1><a href="/">{{ Setting::get('site_title', 'MPress 2.0') }}</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
					@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
				</ul>
			</nav>

		<!-- Banner -->

			@if ( Request::is('/') )
			<section id="banner">
				<h2>{{ Setting::get('site_title', 'MPress 2.0') }}</h2>
				<p>{{ Setting::get('site_description', 'Best. MPress. Yet.') }}</p>
			</section>
			@endif


		<!-- Main -->
			<div id="main" class="container">
				    @include('partials.layout.flashmessage')
				    @include('partials.layout.errors')
					@yield('content')
			</div>

		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved. Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="{{ Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>

	</body>
</html>