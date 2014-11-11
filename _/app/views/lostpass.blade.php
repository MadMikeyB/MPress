@extends('layout')
@section('title', 'Forgotten Password?')
@section('content')

{{ Form::open() }}

@if (Session::has('error'))
	<span class="error">{{ trans(Session::get('reason')) }}</span>
@elseif (Session::has('success'))
    <span class="success">An e-mail with the password reset has been sent.</span>
@endif

<p>{{ Form::label('email', 'Email') }}</p>
<p>{{ Form::text('email', '', array('class' => 'form-control')) }}</p>
<p>{{ Form::submit('Send Reminder', array('class'=>'btn btn-primary')) }}</p>

{{ Form::close() }}

@stop