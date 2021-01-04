@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-2">Hire A HandyWorker</h2>
            <form method="POST" action="#">
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
        </div>
    </div>
@endsection