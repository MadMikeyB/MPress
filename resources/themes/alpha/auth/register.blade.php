@extends('layouts.app')

@section('content')
<div class="box">
    <div class="row">
        <div class="12u">
            <h2>Register</h2>

            <form action="{{url('/register')}}" method="post" role="form">
                {!! csrf_field() !!}

                <div class="row uniform 50%">
                    <div class="12u">
                        <input id="name" name="name" placeholder="Username" type="text" value="{{ old('name') }}">
                    </div>

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
                        <input class="fit" type="submit" value="Log In">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
