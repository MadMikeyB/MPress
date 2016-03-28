<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
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
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo container">
						<div>
							<h1><a href="/" id="logo">{{ Setting::get('site_title', 'MPress 2.0') }}</a></h1>
							<p>{{ Setting::get('site_description') }}</p>
						</div>
					</div>
				</header>
				@yield('hero')

			<!-- Nav -->
				<nav id="nav">
					<ul>
						@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
						@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
					</ul>
				</nav>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row">
							<div class="12u">
								<div class="content">
									<article class="box page-content">
									    @include('partials.layout.flashmessage')
									    @include('partials.layout.errors')
										@yield('content')
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer" class="container">
					<div class="row 200%">
						<div class="12u">

							<!-- Contact -->
								<section>
									<h2 class="major"><span>Get in touch</span></h2>
									<ul class="contact">
										<li><a class="icon fa-facebook" href="http://facebook.com/{{ Setting::get('social_facebook') }}"><span class="label">Facebook</span></a></li>
										<li><a class="icon fa-twitter" href="http://twitter.com/{{ Setting::get('social_twitter') }}"><span class="label">Twitter</span></a></li>
										<li><a class="icon fa-instagram" href="http://instagram.com/{{ Setting::get('social_instagram') }}"><span class="label">Instagram</span></a></li>
										<li><a class="icon fa-google-plus" href="http://plus.google.com/u/{{ Setting::get('social_google') }}"><span class="label">Google+</span></a></li>
									</ul>
								</section>

						</div>
					</div>

					<!-- Copyright -->
						<div id="copyright">
							<ul class="menu">
								<li>&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</footer>
		<!-- Scripts -->
			<script src="{{ Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/jquery.dropotron.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/skel-viewport.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>

	</body>
</html>