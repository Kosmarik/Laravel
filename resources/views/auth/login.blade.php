@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-form-container col-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="email" placeholder="Email"
                           class="{{ $errors->has('email') ? ' is-invalid' : '' }} login-input" name="email"
                           value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                    <br>
                    <input id="password" type="password" placeholder="Password"
                           class="login-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
                    <br>
                    <div class="login-submit-div">


                        <button type="submit" class=" login-btn">
                            {{ __('Login') }}
                        </button>
                        <br>
                        <div class="pretty p-image p-plain login-checkbox-div">
                            <input class="login-checkbox" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <div class="state">
                                <img class="image" src="{{asset('img/yes.svg')}}">
                                <label>Remember me</label>
                            </div>
                        </div>
                        <br>
                        <a class="btn login-a" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
