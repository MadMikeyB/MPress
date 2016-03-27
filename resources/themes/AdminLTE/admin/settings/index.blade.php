@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}}
            <small>Settings</small>
          </h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-cogs pull-right"></i>
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
						<div class="container">
							<div class="row">
							@foreach ( $themes as $theme )
								@if ( $theme != 'themes/AdminLTE')
								<div class="col-md-3">
									<h3 style="text-align:center;">{{ str_replace('themes/', '', $theme) }}</h3>
									<a href="/images/{{ $theme }}.png" target="_blank">
										<img src="/images/{{ $theme }}.png" style="width:100%;">
									</a>
								</div>
								@endif
							@endforeach
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="">Facebook</label>
						<input type="text" name="social_facebook" id="social_facebook" class="form-control input-lg" placeholder="{{ Setting::get('social_facebook', 'facebook') }}" value="{{ Setting::get('social_facebook') }}">
					</div>
					<div class="form-group">
						<label for="">Twitter</label>
						<input type="text" name="social_twitter" id="social_twitter" class="form-control input-lg" placeholder="{{ Setting::get('social_twitter', 'twitter') }}" value="{{ Setting::get('social_twitter') }}">
					</div>
					<div class="form-group">
						<label for="">Google+</label>
						<input type="text" name="social_google" id="social_google" class="form-control input-lg" placeholder="{{ Setting::get('social_google', 'google') }}" value="{{ Setting::get('social_google') }}">
					</div>
					<div class="form-group">
						<label for="">Instagram</label>
						<input type="text" name="social_instagram" id="social_instagram" class="form-control input-lg" placeholder="{{ Setting::get('social_instagram', 'instagram') }}" value="{{ Setting::get('social_instagram') }}">
					</div>
					<div class="form-group">
						<label for="">GitHub</label>
						<input type="text" name="social_github" id="social_github" class="form-control input-lg" placeholder="{{ Setting::get('social_github', 'github') }}" value="{{ Setting::get('social_github') }}">
					</div>
					<div class="form-group">
						<label for="">Contact Email Address</label>
						<input type="text" name="social_email" id="social_email" class="form-control input-lg" placeholder="{{ Setting::get('social_email', 'email@address.com') }}" value="{{ Setting::get('social_email') }}">
					</div>

					<button type="submit" class="btn btn-primary btn-block">Save Settings</button>
				</form>	
			</div>
		</div>
	</div>
</div>
@stop