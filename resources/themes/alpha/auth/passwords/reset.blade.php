@extends('layouts.app')

@section('content')

<div class="box">
    <div class="row">
        <div class="12u">
            <h2>Reset Password</h2>

            <form action="{{url('/password/reset')}}" method="post" role="form">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row uniform 50%">
                    <div class="12u">
                        <input id="email" name="email" placeholder="Email Address" type="email" value="{{ old('email') }}">
                    </div>


                    <div class="6u 12u(mobilep)">
                        <input id="password" name="password" placeholder="Password" type="password" value="">
                    </div>

                    <div class="6u 12u(mobilep)">
                        <input id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" type="password" value="">
                    </div>


                    <div class="12u 12u(mobilep)">
                        <input class="fit" type="submit" value="Reset Password">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
