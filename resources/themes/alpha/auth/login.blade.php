@extends('layouts.app')

@section('content')
<div class="box">
    <div class="row">
        <div class="12u">
            <h2>Login</h2>

            <form action="{{url('/login')}}" method="post" role="form">
                {!! csrf_field() !!}

                <div class="row uniform 50%">
                    <div class="4u 12u(mobilep)">
                        <input id="email" name="email" placeholder="Email Address" type="email" value="{{ old('email') }}">
                    </div>


                    <div class="4u 12u(mobilep)">
                        <input id="password" name="password" placeholder="Password" type="password" value="">
                    </div>


                    <div class="4u 12u(mobilep)">
                        <input class="fit" type="submit" value="Log In">
                    </div>
                </div>


                <div class="row uniform 50%">
                    <div class="6u 12u(narrower)">
                        <input checked="" id="remember" name="remember" type="checkbox"> 
                        <label for="remember">Keep me logged in</label>
                    </div>


                    <div class="6u 12u(narrower)">
                        <a href="{{url('/password/reset')}}">I forgot my password!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
