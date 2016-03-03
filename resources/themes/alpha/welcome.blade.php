@extends('layouts.app')

@section('content')
<div class="box">
    <div class="row">
        <div class="12u">
            @if (Auth::check())
                <h2>Welcome back, {{ Auth::user()->name }}!</h2>
                <div class="row uniform">
                    <div class="6u">
                        <a href="/posts" class="button fit">Posts</a>
                    </div>
                    <div class="6u">
                        <a href="/dashboard" class="button alt fit">Dashboard</a>
                    </div>
                </div>
            @else
                <div class="row uniform">
                    <div class="4u">
                        <a href="/posts" class="button special fit">Posts</a>
                    </div>
                    <div class="4u">
                        <a href="/login" class="button fit">Log In</a>
                    </div>
                    <div class="4u">
                        <a href="/register" class="button alt fit">Register</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
