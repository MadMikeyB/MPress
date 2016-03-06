@extends('layouts.app')

@section('content')
	<div class="box">
		<div class="row">
			<div class="12u">
				<h2>Hello, &#64;{{ $user->name }}</h2>

				<form action="/&#64;{{$user->slug}}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}

					<div class="row uniform">
						<div class="12u">
							<input type="text" id="nickname" name="nickname" placeholder="Your Nickname" value="{{ $user->nickname }}">
						</div>
					</div>

					<div class="row uniform">
						<div class="12u">
							<input type="email" id="email" name="email" placeholder="Your Email Address" value="{{ $user->email }}">
						</div>
					</div>

					<div class="row uniform">
						<div class="12u">
							<input type="password" id="old_password" name="old_password" placeholder="Your Current Password">
						</div>
					</div>

					<div class="row uniform">
						<div class="12u">
							<input type="password" id="new_password" name="new_password" placeholder="Your New Password">
						</div>
					</div>

					<div class="row uniform">
						<div class="12u">
							<input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm Password">
						</div>
					</div>


					<div class="row uniform">
						<div class="12u">
							<input type="submit" class="button special fit" value="Update Profile">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop