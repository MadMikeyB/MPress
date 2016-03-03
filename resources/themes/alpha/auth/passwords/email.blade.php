@extends('layouts.app')

<!-- Main Content -->
@section('content')

<div class="box">
    <div class="row">
        <div class="12u">
            <h2>Reset Password</h2>

            <form action="{{url('/password/email')}}" method="post" role="form">
                {!! csrf_field() !!}

                <div class="row uniform 50%">

                    <div class="12u">
                        <input id="email" name="email" placeholder="Email Address" type="email" value="{{ old('email') }}">
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="12u 12u(mobilep)">
                        <input class="fit" type="submit" value="Send Password Reset Link">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
