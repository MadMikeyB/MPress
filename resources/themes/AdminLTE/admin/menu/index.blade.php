@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}}
            <small>Menu Manager</small>
          </h1>
@stop

@section('content')

<div class="row">
	<div class="col-md-12 form-group">
		<textarea class="form-control" id="mp-editor"></textarea>
	</div>
</div>

@stop