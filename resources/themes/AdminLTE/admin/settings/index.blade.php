@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}}
            <small>Settings</small>
          </h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-offset-1 col-md-10 col-sm-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-cogs"></i>
				<h3 class="box-title">Settings</h3>
			</div>

			<div class="box-body">
				<form action="/admin/settings" method="POST" role="form">
					{{ csrf_field() }}


					<div class="form-group">
						<label for="">Site Title</label>
						<input type="text" name="site_title" id="site_title" class="form-control input-lg" placeholder="{{ Setting::get('site_title', 'Site Title') }}" value="{{ Setting::get('site_title') }}">
					</div>

					<div class="form-group">
						<label for="">Site Description (May only be used on some themes)</label>
						<input type="text" name="site_description" id="site_description" class="form-control input-lg" placeholder="{{ Setting::get('site_description', 'Site Description') }}" value="{{ Setting::get('site_description') }}">
					</div>

					<div class="form-group">
						<label>Active Theme</label>
						<select name="theme_name" class="form-control input-lg">
							@foreach ( $themes as $theme)
							@if ( $theme != 'themes/AdminLTE')
								<option value="{{ str_replace('themes/', '', $theme) }}" @if ( Setting::get('theme_name') == str_replace('themes/', '', $theme) ) selected @endif>{{ str_replace('themes/', '', $theme) }}</option>
							@endif
							@endforeach
						</select>
					</div>

					<button type="submit" class="btn btn-primary btn-block">Save Settings</button>
				</form>	
			</div>
		</div>
	</div>
</div>
@stop