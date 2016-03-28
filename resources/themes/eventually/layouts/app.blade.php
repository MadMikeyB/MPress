<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		{!! SEO::generate() !!}
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/html5shiv.js', null, true) }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ Theme::asset('css/main.css', null, true) }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ Theme::asset('css/ie8.css', null, true) }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ Theme::asset('css/ie9.css', null, true) }}" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1>{{ Setting::get('site_title', 'MPress 2.0')}} <small style="font-size:0.5em;"><em>is Coming Soon</em></small></h1>
				@if ( Auth::check() )
					@if (Auth::user()->isAdmin() )
						<p>This is just a coming soon theme. No content will be rendered using this theme. To see your content, switch Themes under Admin &gt; Settings</p>
					@endif
				@else
					<p>{{ Setting::get('site_description', 'Best. MPress. Yet.')}}</p>
				@endif
			</header>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="http://twitter.com/{{ Setting::get('social_twitter') }}" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="http://instagram.com/{{ Setting::get('social_instagram') }}" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="http://github.com/{{ Setting::get('social_github') }}" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="mailto:{{ Setting::get('social_email') }}" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved.</li><li>Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a></li><li>Theme by <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="{{ Theme::asset('js/ie/respond.min.js', null, true) }}"></script><![endif]-->
			<script src="{{ Theme::asset('js/main.js', null, true) }}"></script>

	</body>
</html>