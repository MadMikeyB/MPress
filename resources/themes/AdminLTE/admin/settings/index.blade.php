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
						<label>Active Theme</label>
						<select name="theme_name" class="form-control input-lg">
							@foreach ( $themes as $theme)
							@if ( $theme != 'themes/AdminLTE')
								<option value="{{ str_replace('themes/', '', $theme) }}">{{ str_replace('themes/', '', $theme) }}</option>
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