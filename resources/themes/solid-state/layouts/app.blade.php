<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
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
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ Theme::asset('css/ie9.css', null, true) }}" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ Theme::asset('css/ie8.css', null, true) }}" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/">{{ Setting::get('site_title', 'MPress 2.0') }}</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
								@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Wrapper -->
					<section id="wrapper">
						@if ( Request::is('/') )
						<header>
							<div class="inner">
								<h2>{{ Setting::get('site_title', 'MPress 2.0') }}</h2>
								<p>{{ Setting::get('site_description', 'Best. MPress. Yet.') }}</p>
							</div>
						</header>
						@endif

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">
								    @include('partials.layout.flashmessage')
								    @include('partials.layout.errors')
									@yield('content')
								</div>
							</div>

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="{{ Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/jquery.scrollex.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>

	</body>
</html>