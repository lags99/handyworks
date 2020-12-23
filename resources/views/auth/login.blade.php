@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <h2 class="text-center mb-3">Sign in to your account</h2>
        <div class="text-center">
            <img src="{{ asset('img/hw.png') }}" width="200px">
        </div>
        <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('Email') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control" name="password" required autofocus>
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>
                        <label for="remember">{{__('Remember Me')}}</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                    </div>
                </form>
                <div class="row my-5">
                    <div class="col-md-6 my-2">
                        <a href="{{ route('facebook.auth') }}" class="btn btn-block btn-fb"><i class="fab fa-facebook"></i> Sign In With Facebook</a>
                    </div>
                    <div class="col-md-6 my-2">
                        <a href="{{ route('google.auth') }}" class="btn btn-block btn-gmail"><i class="fab fa-google"></i> Sign In With Gmail</a>
                    </div>
                </div>
        </div>
    </div>
@endsection
