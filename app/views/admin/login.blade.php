<!DOCTYPE html>
<html class="bg-light-blue">
    <head>
        <meta charset="UTF-8">
        <title>Log In | {{-- $settings->sitename --}}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../packages/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../packages/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../packages/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-light-blue">
        <div class="form-box" id="login-box">
        	<div class="header bg-aqua">Sign In</div>
	        	{{ Form::open() }}
	        	<div class="body bg-gray">
		        	<!-- check for login errors flash var -->
		        	@if (Session::has('login_errors'))
		        		<span class="error">Username or password incorrect.</span>
		        	@endif
		        	
		        	<div class="form-group">
		        		{{ Form::label('username', 'Username') }}
		        		{{ Form::text('username', '', array( 'class' => 'form-control', 'placeholder' => 'Username' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::label('password', 'Password') }}
		        		{{ Form::password('password', array( 'class' => 'form-control', 'placeholder' => 'Password' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::checkbox('rememberme') }} Stay logged in?
                    </div>
                </div>
                <div class="footer">
                	{{ Form::submit('Sign me in', array( 'class' => 'btn bg-aqua btn-block' ) ) }}
                	<p><a href="/password/remind">I forgot my password</a></p>
				</div>
            {{ Form::close() }}
        </div>
        
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../packages/admin/js/bootstrap.min.js" type="text/javascript"></script>        
    </body>
</html>