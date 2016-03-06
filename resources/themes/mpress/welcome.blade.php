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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <button type="button" href="/posts" class="btn btn-primary btn-block">Posts</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" href="/dashboard" class="btn btn-default btn-block">Dashboard</button>
                                </div>
                            </div>
                        </div>
                    @else 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <button type="button" href="/posts" class="btn btn-primary btn-block">Posts</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" href="/login" class="btn btn-secondary btn-block">Log In</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" href="/register" class="btn btn-default btn-block">Register</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
