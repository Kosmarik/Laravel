@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-form-container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                                <input id="name" type="text" class="login-input{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <input id="email" type="email" class="login-input{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif


                                <input id="password" type="password" class="login-input{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <input id="password-confirm" type="password" class="login-input" name="password_confirmation" placeholder="Confirm password" required>

                                <div class="login-submit-div">
                                    <button type="submit" class="login-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
