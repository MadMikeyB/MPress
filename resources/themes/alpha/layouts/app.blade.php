<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{ Setting::get('site_title', 'MPress 2.0') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/html5shiv.js', null, true) }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ Theme::asset('css/main.css', null, true) }}" />

	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="/">{{ Setting::get('site_title', 'MPress 2.0') }}</a></h1>
					<nav id="nav">
						<ul>
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
						</ul>
					</nav>
				</header>

				<!-- Main -->
				<section id="main" class="container">
					@if ( Request::is('/') )
					<header>
						<h2>{{ Setting::get('site_title', 'MPress 2.0') }}</h2>
						<p>{{ Setting::get('site_description', 'Best. MPress. Yet.') }}</p>
					</header>
					@endif
				
				    @include('partials.layout.flashmessage')
				    @include('partials.layout.errors')
					@yield('content')

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; {{ Setting::get('site_name', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="{{ Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/jquery.dropotron.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/jquery.scrollgress.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>
			@yield('scripts')

	</body>
</html>