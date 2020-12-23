@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-3">
    <div class="col-md-8">
        <h2 class="text-center">Fill up this form to get started</h2>
        <p class="lead text-center">We may ask for a couple of required documents for validation.</p>
        <div class="my-2">
             @include('includes.flash')
        </div>
        <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="full_name" class="col-form-label">{{ __('Full Name') }}</label>
                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autofocus>
                        @error('full_name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-form-label">{{__('Gender')}}</label>
                        <select class="form-control" name="gender" id="gender">
                            <option disabled value="" selected>- Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">{{ __('Birth Date') }}</label>
                        <div class="d-flex">
                            <input type="number" min="1" max="12" class="form-control @error('birth_date') is-invalid @enderror month" required placeholder="Month" autofocus>
                            
                            <input type="number" min="1" max="31" class="form-control @error('birth_date') is-invalid @enderror day" required placeholder="Day" autofocus>
                            
                            <input type="number" min="1970" max="2002" class="form-control @error('birth_date') is-invalid @enderror year" required placeholder="Year" autofocus>
                        </div>
                        <input type="hidden" class="@error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date">
                        @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-form-label">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="city">{{__('City')}}</label>
                        <select name="city" class="form-control @error('city') is-invalid @enderror" id="city" >
                            <option disabled selected>- Select Your City</option>
                            @if ($cities->count())
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('city')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="profile_picture" value="{{ old('profile_picture') ? old('profile_picture') : 'no_profile.jpg'}}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                        </button>
                    </div>
                </form>
                <div class="row my-5">
                    <div class="col-md-6 my-2">
                        <a href="#" class="btn btn-block btn-fb"><i class="fab fa-facebook"></i> Sign In With Facebook</a>
                    </div>
                    <div class="col-md-6 my-2">
                        <a href="{{ route('google.auth') }}" class="btn btn-block btn-gmail"><i class="fab fa-google"></i> Sign In With Gmail</a>
                    </div>
                </div>
            </div>
            
    </div>
@endsection
