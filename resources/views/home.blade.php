@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <h3>Your Posts</h3>
                    <div class="list-group">
                    @foreach ( $posts as $post )
                        <a href="/read/{{ $post->slug }}" class="list-group-item">{{ $post->title }}</a>
                    @endforeach
                    </div>

                    <h3>You Commented on:</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
