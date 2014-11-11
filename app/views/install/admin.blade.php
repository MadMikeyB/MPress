@extends('install/installer')
@section('installer')
	        	<div class="body bg-white">
		        {{ Form::open() }}
		        	<!-- check for login errors flash var -->
		        	@if (Session::has('install_errors'))
		        		<span class="error">Error: </span>
		        	@endif
		        	
		        	<div class="form-group">
		        		{{ Form::label('adminuser', 'Admin Username') }}
		        		{{ Form::text('adminuser', '', array( 'class' => 'form-control', 'placeholder' => 'admin', 'required' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::label('adminemail', 'Admin Email') }}
		        		{{ Form::email('adminemail', '', array( 'class' => 'form-control', 'placeholder' => 'you@example.com', 'required' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::label('adminpassword', 'Admin Password') }}		        		
		        		{{ Form::password('adminpassword', array( 'class' => 'form-control', 'required' ) ) }}
		        	</div>
                </div>
                <div class="footer">
                	{{ Form::submit('Continue', array( 'class' => 'btn bg-light-blue btn-block' ) ) }}
				</div>
            {{ Form::close() }}
@stop