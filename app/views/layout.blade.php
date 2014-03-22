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
    <link href="http://{{ $_SERVER['HTTP_HOST'] }}/packages/css/bootstrap-blog.css" rel="stylesheet">
    
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
	        		<li>{{ HTML::link($m->url, $m->title, array('class' => 'blog-nav-item') ) }}</li>
	        	@endforeach
	        @endif
	        </ul>
	        <ul class="nav navbar-nav navbar-right">
	        	{{-- Guest Login / Admin Links --}}
	        	
	            @if ( Auth::guest() )
	            	{{-- @if ($settings->login_alt == '0') --}}
	              	<li>{{ HTML::link('login', 'Login', array('class' => 'blog-nav-item')) }}</li>
	              	{{-- @endif --}}
				@else
					<li>{{ HTML::link('logout', 'Logout', array('class' => 'blog-nav-item')) }}</li>
				@endif
				
				@if ( !Auth::guest() )
					<li>{{ HTML::link('admin', 'Site Admin', array('class' => 'blog-nav-item')) }}</li>
				@endif
			</ul>
		</div>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">{{-- $settings->title --}}</h1>
        <p class="lead blog-description">{{-- $settings->desc --}}</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
			@yield('content')
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        	{{-- @if ($settings->login_alt == '1') --}}
        	<div class="sidebar-module sidebar-module-inset">
        	    @if ( Auth::guest() )
        		<a class="btn btn-lg btn-success" href="/login">Log in to begin creating</a>
        		@else
        		<a class="btn btn-lg btn-success" href="/admin/posts">Write an epic article :)</a>
        		@endif
        	</div>
        	{{-- @endif --}}
        	
          {{-- @if ($settings->about_toggle == '1') --}}
          <!-- <div class="sidebar-module sidebar-module-inset"> -->
            <h4>{{-- $settings->about --}}</h4>
            <p>{{-- $settings->about_desc --}}</p>
          <!-- </div> -->
          {{-- @endif --}}
          
          <div class="sidebar-module sidebar-module-inset">
          	@yield('sidebar')
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>Powered by <a href="http://mikeylicio.us/mikeypress" title="MikeyPress - Open Source, Free, Lightweight, Simple Content Management System" role="copyright" target="_blank" rel="dofollow">MPress</a> &copy; 2012 &mdash; {{ date('Y') }}</p>
      <p>
       	<small>Built with <a href="http://laravel.com" target="_blank">Laravel</a>, <a href="http://getbootstrap.com" target="_blank">Bootstrap</a> &amp; &hearts;</small>
      </p>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>
</html>
