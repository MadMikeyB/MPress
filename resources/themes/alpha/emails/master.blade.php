<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<style>
		body {
			background: #DDDDDD;
			color: #000000;
		}
		.wrapper {
			width: 450px;
			background: #FFFFFF;
			color: #000000;
			margin: auto;
			min-height: 450px;
			height:100%;
			padding:25px;
			position: relative;
		}
		.footer {
			width: 100%;
			position:absolute;
			bottom:0;
			left:0;
			background: #EEEEEE;
			color: #444444;
			text-align: center;
		}
		blockquote {
			border-left: 5px solid #CCCCCC;
			padding-left:10px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		@yield('content')
		
		<div class="footer">
			<p>This email was sent because you made a post on {{ Setting::get('site_title')}} &mdash; <a href="">Unsubscribe</a></p>
		</div>
	</div>
</body>
</html>