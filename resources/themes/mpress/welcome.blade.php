@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (Auth::check())
                        <p>Welcome back, {{ Auth::user()->name }}</p>
                    @else 
                        <strong>MPress 2.0</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
