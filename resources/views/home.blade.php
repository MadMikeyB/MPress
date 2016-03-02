@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <h3>Your Posts</h3>
                    <div class="list-group">
                    {{-- This users Posts --}}
                    @unless ( $posts->isEmpty() )
                        @foreach ( $posts as $post )
                            <a href="/read/{{ $post->slug }}" class="list-group-item">
                                {{ $post->title }}
                                @unless ( $post->comments->isEmpty() )
                                    @if ( $post->comments[0]->author_id === Auth::user()->id )
                                        <span class="badge badge-red">You have commented!</span>
                                    @endif
                                @endunless
                            </a>
                        @endforeach
                    @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection