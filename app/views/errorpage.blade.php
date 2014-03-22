@extends('layout')
@section('title', 'Whoops!')
@section('content')

<div class="post">
 <h1>Whoops!</h1>
 <h2>There was an error</h2>
 <p>We're sorry, but "{{ $page }}" does not exist. Please re-check the URL which you visited.</p>
 <p>If you believe that you are seeing this page in error, please contact me. :)</p>
</div>

@stop
