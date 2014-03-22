@extends('layout')
@section('title', 'Log In')
@section('content')

{{ Form::open() }}
<!-- check for login errors flash var -->
@if (Session::has('login_errors'))
	<br />
	<span class="error">Username or password incorrect.</span>
@endif
		<!-- username field -->
		<p>{{ Form::label('username', 'Username') }}</p>
		<p>{{ Form::text('username', '', array('class' => 'form-control')) }}</p>
		<!-- password field -->
		<p>{{ Form::label('password', 'Password') }}</p>
		<p>{{ Form::password('password', array('class' => 'form-control')) }}</p>
		<!-- submit button -->
		<p>{{ Form::submit('Login', array('class'=>'btn btn-primary')) }}</p>
{{ Form::close() }}
@stop

@section('sidebar')
<p>Unfortunately, due to an overwhelming amount of spam registrations, registrations are closed</p>
@stop