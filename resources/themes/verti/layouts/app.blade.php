<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
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
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="/">{{ Setting::get('site_title', 'MPress 2.0') }}</a></h1>
								<span>{{ Setting::get('site_description', 'Best. MPress. Yet.') }}</span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
									@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
								</ul>
							</nav>

					</header>
				</div>

			<!-- Main -->
				<div id="">
					<div class="container">
						<div id="content">
							<!-- Content -->
								<article>
									@include('partials.layout.flashmessage')
								    @include('partials.layout.errors')
									@yield('content')
								</article>

						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			<script src="{{Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/jquery.dropotron.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{Theme::asset('js/main.js', null, true) }}"></script>

	</body>
</html>