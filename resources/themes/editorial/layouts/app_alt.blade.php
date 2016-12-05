<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		{!! SEO::generate() !!}
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/html5shiv.js', null, true) }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ Theme::asset('css/main.css', null, true) }}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ Theme::asset('css/ie9.css', null, true) }}" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ Theme::asset('css/ie8.css', null, true) }}" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="/" class="logo"><strong>{{ Setting::get('site_title', 'MPress 2.0') }}</strong></a>
									<ul class="icons">
										@if ( Setting::get('social_twitter') )
										<li>
											<a href="{{ Setting::get('social_twitter') }}" class="icon fa-twitter"><span class="label">Twitter</span></a>
										</li>
										@endif
										@if ( Setting::get('social_facebook') )
										<li>
											<a href="{{ Setting::get('social_facebook') }}" class="icon fa-facebook"><span class="label">Facebook</span></a>
										</li>
										@endif
										@if ( Setting::get('social_github') )
										<li>
											<a href="{{ Setting::get('social_github') }}" class="icon fa-github"><span class="label">Github</span></a>
											@endif
										</li>
										@if ( Setting::get('social_instagram') )
										<li>
											<a href="{{ Setting::get('social_instagram') }}" class="icon fa-instagram"><span class="label">Instagram</span></a>
											@endif
										</li>
										@if ( Setting::get('social_google') )
										<li>
											<a href="{{ Setting::get('social_google') }}" class="icon fa-google"><span class="label">Google</span></a>
										</li>
										@endif
									</ul>
								</header>


						    @include('partials.layout.flashmessage')
						    @include('partials.layout.errors')
							@yield('content')

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
									@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
									@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
									</ul>
								</nav>

							<!-- Section -->
								{{-- <section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section> --}}

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
{{-- 									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
 --}}									<ul class="contact">
										<li class="fa-envelope-o"><a href="mailto:{{ Setting::get('social_email')}}">{{ Setting::get('social_email')}}</a></li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</p>
									<p class="copyright">Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></p>
									<p class="copyright">Theme by <a href="http://html5up.net">HTML5 UP</a></p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="{{ Theme::asset('js/jquery.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/skel.min.js', null, true) }}"></script>
			<script src="{{ Theme::asset('js/util.js', null, true) }}"></script>
			<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>

	</body>
</html>