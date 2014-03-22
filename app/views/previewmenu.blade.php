<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../packages/favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="../packages/css/bootstrap-blog.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
      	<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<span class="sr-only">Toggle navigation</span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </button>
            {{-- @if ( $settings->showbranding == '1' ) --}}
            {{-- <a class="navbar-brand" href="#">@yield('title')</a> --}}
            {{-- @endif --}}
        </div>
        
      	<div class="navbar-collapse collapse">
	        <ul class="nav navbar-nav">
	        @if ( @$menu )
	        	@foreach ( $menu as $m )
	        		<li>{{ HTML::link($m->url, $m->title, array('class' => 'blog-nav-item', 'onclick' => 'javascript:void(0);return false;') ) }}</li>
	        	@endforeach
	        @endif
	        </ul>
	        <ul class="nav navbar-nav navbar-right">
	        	{{-- Guest Login / Admin Links --}}
	        	
	            @if ( Auth::guest() )
	            	{{-- @if ($settings->login_alt == '0') --}}
	              	<li>{{ HTML::link('login', 'Login', array('class' => 'blog-nav-item', 'onclick' => 'javascript:void(0);return false;')) }}</li>
	              	{{-- @endif --}}
				@else
					<li>{{ HTML::link('logout', 'Logout', array('class' => 'blog-nav-item', 'onclick' => 'javascript:void(0);return false;')) }}</li>
				@endif
				
				@if ( !Auth::guest() )
					<li>{{ HTML::link('admin', 'Site Admin', array('class' => 'blog-nav-item', 'onclick' => 'javascript:void(0);return false;')) }}</li>
				@endif
			</ul>
		</div>
      </div>
    </div>
         
          <div style="background:white;text-align:center;padding:4px;font-family:trebuchet MS;font-weight:100;margin-top:55px;">
          	<h2>PREVIEW</h2>
          	<p>Site Admin / Login / Logout links are not changeable.</p>
          	<p><small><em>Links have been disabled for security.</em></small></p>
          </div>
</body>
</html>