@extends('layout')
@section('content')
        <!-- MENU -->
        <div id="main_in">
          <div id="menu_wrapper">
            <div id="menu_left"></div>
            <ul id="menu">
            @foreach ( $menu as $m )
            	<li><a href="{{ $m->url }}">{{ $m->title }}</a></li>
            @endforeach
            </ul>
            <div id="menu_right"></div>
            <div class="clear"></div>
          </div>
@stop