@extends('layout')
@section('title', 'Reset Password')
@section('content')

{{ Form::open() }}

@if (Session::has('error'))
	<span class="error">{{ trans(Session::get('reason')) }}</span>
@endif

<p>{{ Form::hidden('token', $token) }}</p>
<p>{{ Form::label('email', 'Email') }}</p>
<p>{{ Form::text('email', '', array('class' => 'form-control')) }}</p>
<p>{{ Form::label('password', 'Password') }}</p>
<p>{{ Form::password('password', array('class' => 'form-control')) }}</p>
<p>{{ Form::label('password', 'Confirm Password') }}</p>
<p>{{ Form::password('password_confirmation', array('class' => 'form-control')) }}</p>
<p>{{ Form::submit('Change Password', array('class'=>'btn btn-primary')) }}</p>

{{ Form::close() }}

@stop