@extends('install/installer')
@section('installer')
	        	<div class="body bg-white">
		        {{ Form::open() }}
		        	<!-- check for login errors flash var -->
		        	@if (Session::has('install_errors'))
		        		<span class="error">Error: </span>
		        	@endif
		        	
		        	<div class="form-group">
		        		{{ Form::label('dbhost', 'Database Host') }}
		        		{{ Form::text('dbhost', '', array( 'class' => 'form-control', 'placeholder' => 'localhost', 'value' => 'localhost', 'required' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::label('dbname', 'Database Name') }}
		        		{{ Form::text('dbname', '', array( 'class' => 'form-control', 'placeholder' => 'mpresscms', 'required' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::label('dbusername', 'Database Username') }}
		        		{{ Form::text('dbusername', '', array( 'class' => 'form-control', 'placeholder' => 'mpress', 'required' ) ) }}
		        	</div>
		        	
		        	<div class="form-group">
		        		{{ Form::label('dbpassword', 'Database Password') }}
		        		{{ Form::password('dbpassword', array( 'class' => 'form-control', 'required'  ) ) }}
		        	</div>
		        	
                </div>
                <div class="footer">
                	{{ Form::submit('Save &amp; Continue', array( 'class' => 'btn bg-light-blue btn-block' ) ) }}
				</div>
            {{ Form::close() }}
@stop