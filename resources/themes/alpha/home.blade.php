@extends('layouts.app')

@section('content')
<div class="box">
    <div class="row">
        <div class="12u">
            <h2>Welcome back, {{ Auth::user()->name }}!</h2>
        </div>

                @unless ( $posts->isEmpty() )
                <div class="12u">
                    <h3>Your Posts</h3>
                </div>
                    {{-- This users Posts --}}
                        @foreach ( $posts as $post )
                        <div class="12u">
                        <header>
                            <h3>{{ $post->title }}</h3>
                                @unless ( $post->comments->isEmpty() )
                                    @if ( $post->comments[0]->author_id === Auth::user()->id )
                                        <p>You have commented!</p>
                                    @endif
                                @endunless
                            </header>
                            <div class="4u">
                            <a href="/read/{{ $post->slug }}" class="button small fit">Read Post</a>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    @endunless
                </div>
            </div>
@endsection