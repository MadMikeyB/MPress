@extends('layout')
@section('title', $page->title)
@section('crumbs', $page->title)
@section('content')

<style>
/* make keyframes that tell the start state and the end state of our object */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
 
.fade-in {
    opacity:0;  /* make things invisible upon start */
    -webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
    -moz-animation:fadeIn ease-in 1;
    animation:fadeIn ease-in 1;
 
    -webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
    -moz-animation-fill-mode:forwards;
    animation-fill-mode:forwards;
 
    -webkit-animation-duration:1s;
    -moz-animation-duration:1s;
    animation-duration:1s;
}

.fade-in.one {
-webkit-animation-delay: 0.5s;
-moz-animation-delay: 0.5s;
animation-delay: 0.5s;
}
 
.fade-in.two {
-webkit-animation-delay: 1.2s;
-moz-animation-delay:1.2s;
animation-delay: 1.2s;
}
 
.fade-in.three {
-webkit-animation-delay: 1.6s;
-moz-animation-delay: 1.6s;
animation-delay: 1.6s;
}
</style>

<div class="page fullwidth fade-in one">
 <h1>{{ HTML::link($page->slug, $page->title) }}</h1>
 <p>{{ $page->body }}</p>
 <p>{{ HTML::link('/', '&larr; Back to index.') }}</p>
</div>

@stop
