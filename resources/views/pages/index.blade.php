@extends('layouts.home-page')
@section('content')
    <main class="start">
        <div class="start__slides">
            <div class="start__slide active_slide start__slide--one">
                <div class="start__slide__image">
                    <img src="{{ asset('img/hw.png') }}" data-aos="fade-right" data-aos-duration="500" data-aos-easing="ease-in" data-aos-mirror="false" data-aos-once="false" data-aos-anchor-placement="top-center" alt="">
                </div>
                <div class="start__slide__content">
                    <h2 class="start__slide__title">What Is HandyWorks</h2>
                    <p class="start__slide__text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi maxime corporis quibusdam veritatis sit nobis recusandae obcaecati dolorem molestias eum, magni ipsam officia? Ullam distinctio cumque laboriosam! Totam, quidem voluptate!
                    </p>
                </div>
            </div>
            <div class="start__slide start__slide--two">
                <div class="start__slide__image">
                    <img src="{{ asset('img/tablet.png') }}" data-aos="fade-down" data-aos-duration="500" data-aos-easing="ease-in" data-aos-mirror="false" data-aos-once="false" data-aos-anchor-placement="top-center" alt="">
                </div>
                <div class="start__slide__content">
                    <h2 class="start__slide__title">How It Works For Workers</h2>
                    <p class="start__slide__text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi maxime corporis quibusdam veritatis sit nobis recusandae obcaecati dolorem molestias eum, magni ipsam officia? Ullam distinctio cumque laboriosam! Totam, quidem voluptate!
                    </p>
                </div>
            </div>
            <div class="start__slide start__slide--three">
                <div class="start__slide__image">
                    <img src="{{ asset('img/card.png') }}" data-aos="fade-left" data-aos-duration="500" data-aos-easing="ease-in" data-aos-mirror="false" data-aos-once="false" data-aos-anchor-placement="top-center" alt="">
                </div>
                <div class="start__slide__content">
                    <h2 class="start__slide__title">How It Works For Clients</h2>
                    <p class="start__slide__text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi maxime corporis quibusdam veritatis sit nobis recusandae obcaecati dolorem molestias eum, magni ipsam officia? Ullam distinctio cumque laboriosam! Totam, quidem voluptate!
                    </p>
                </div>
            </div>
            
            <div class="start__slide start__slide--four" style="background-image: url({{asset('img/worker.jpg')}})">
                <div class="start__slide__image start__slide__image--hide"></div>
                <div class="start__slide__content start__slide__content--four">
                    <div class="start__slide__actions" data-aos="fade-down" data-aos-duration="500" data-aos-easing="ease-in" data-aos-mirror="false" data-aos-once="false" data-aos-anchor-placement="top-center">
                        <h2 class="start__slide__title start__slide__title--four">Join Us</h2>
                        <a href="#" class="start__slide__link start__slide__link--hire">Hire A HandyWorker</a>
                        <a href="{{ route('pre_register') }}" class="start__slide__link start__slide__link--become">Become A HandyWorker</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="start__controls">
            <div class="start__controls__back">
            </div>
            <div class="start__controls__slides">
                <div class="start__controls__slide active_controls"></div>
                <div class="start__controls__slide"></div>
                <div class="start__controls__slide"></div>
                <div class="start__controls__slide"></div>
            </div>
            <div class="start__controls__next">
            </div>
        </div>
    </main>
@endsection

{{-- <div style="background-image: url({{ asset('img/worker.jpg') }})" class="jumbotron jumbotron-fluid hero d-flex justify-content-center align-items-center">
        <div>
            <h1 class="text-center my-3">HandyWorks</h1>
            <div class="row justify-content-center my-4">
                <div class="my-1 col text-center">
                    <a href="{{ route('pre_register') }}" class="btn btn-primary btn-lg">Become A HandyWorker</a>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid about">
        <div class="container">
            <div class="row my-2">
                <div class="col">
                    <h2 class="font-weight-bold py-3 text-warning">What Is HandyWorks</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem commodi ipsam impedit, nihil reiciendis architecto ullam dignissimos ex voluptates, at similique omnis itaque, saepe exercitationem. Laboriosam quos placeat, atque dolorem cum omnis dolores, iure officia error nesciunt suscipit? Nam, iure.
                    </p>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <h2 class="font-weight-bold py-3 text-warning">Setting Your Intentions Is Easy</h2>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-4 my-2">
                    <div class="text-center">
                        <i class="text-primary icon" data-feather="briefcase"></i>
                        <h5 class="my-3 text-primary font-weight-bold">Earn As Freelancers</h5>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="text-center">
                        <i class="text-primary icon" data-feather="watch"></i>
                        <h5 class="my-3 text-primary font-weight-bold">Earn In Your Free Time</h5>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="text-center">
                        <i class="text-primary icon" data-feather="clock"></i>
                        <h5 class="text-primary font-weight-bold my-3">Earn Full-Time</h5>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <h2 class="font-weight-bold py-3 text-warning">Our Service To Every Household</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem commodi ipsam impedit, nihil reiciendis architecto ullam dignissimos ex voluptates, at similique omnis itaque, saepe exercitationem. Laboriosam quos placeat, atque dolorem cum omnis dolores, iure officia error nesciunt suscipit? Nam, iure.
                    </p>
                </div>
                <div class="col-md-6">
                    <h2 class="font-weight-bold py-3 text-warning">Our Service To All Offices</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem commodi ipsam impedit, nihil reiciendis architecto ullam dignissimos ex voluptates, at similique omnis itaque, saepe exercitationem. Laboriosam quos placeat, atque dolorem cum omnis dolores, iure officia error nesciunt suscipit? Nam, iure.
                    </p>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <h2 class="text-warning font-weight-bold py-3">Earn Your Membership</h2>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <ol class="how-to">
                        <li class="how-to-item">
                            <h3 class="font-weight-bold">Set your skills and specialization</h3>
                        </li>
                        <li class="how-to-item">
                            <h3 class="font-weight-bold">Post your service rates</h3>
                        </li>
                        <li class="how-to-item">
                            <h3 class="font-weight-bold">Start Receiving Bookings</h3>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <h2 class="text-warning font-weight-bold my-2">What's New</h2>
                    <div class="row my-2">
                        @if ($latest->count())
                            @foreach ($latest as $post)
                                <div class="col-md-4 my-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold">{{ $post->title }}</h5>
                                            <h6 class="card-subtitle mb-2">Posted in <span class="text-warning">{{ $post->created_at->toFormattedDateString() }}</span> by <span class="text-warning">{{ $post->admin->username }}</span></h6>
                                            <p>{!! $post->excerpt() !!}</p>
                                            <div class="my-2">
                                                <a href="{{ route('single', $post) }}" class="text-warning font-weight-bold">View Post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-warning font-weight-bold my-2">Popular Services</h2>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">Driver</h5>
                                <p class="lead my-3">Average Daily Rate: <strong class="font-weight-bold">P500</strong></p>
                                <p class="lead my-3">Possible Income: <strong class="font-weight-bold">P24,000</strong></p>
                                <a href="{{ route('pre_register') }}" class="btn btn-primary btn-block">Sign Up Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">Plumber</h5>
                                <p class="lead my-3">Average Daily Rate: <strong class="font-weight-bold">P500</strong></p>
                                <p class="lead my-3">Possible Income: <strong class="font-weight-bold">P24,000</strong></p>
                                <a href="{{ route('pre_register') }}" class="btn btn-primary btn-block">Sign Up Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">House Sanitizing</h5>
                                <p class="lead my-3">Average Daily Rate: <strong class="font-weight-bold">P500</strong></p>
                                <p class="lead my-3">Possible Income: <strong class="font-weight-bold">P24,000</strong></p>
                                <a href="{{ route('pre_register') }}" class="btn btn-primary btn-block">Sign Up Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-warning font-weight-bold py-2">Our Services Are Open To All Within Metro Manila</h2>
                    <div id="map" class="my-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid register">
        <div class="container">
            <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <h2 class="text-center">Fill up this form to get started</h2>
                <p class="lead text-center">We may ask for a couple of required documents for validation.</p>
                <form method="POST" action="{{ route('register') }}">
                            @csrf
                             <div class="form-group">
                        <label for="full_name" class="col-form-label">{{ __('Full Name') }}</label>
                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required>
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
                                    <input type="number" min="1" max="12" class="form-control @error('birth_date') is-invalid @enderror month" required placeholder="Month" >
                                    
                                    <input type="number" min="1" max="31" class="form-control @error('birth_date') is-invalid @enderror day" required placeholder="Day" >
                                    
                                    <input type="number" min="1970" max="2002" class="form-control @error('birth_date') is-invalid @enderror year" required placeholder="Year" >
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
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                                @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-form-label">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required >
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibGluY29sZGFyaGVuOTkiLCJhIjoiY2tpaTk0cjM2MDl5eTJzcW1keXI2dmg4NCJ9.a3F7jm1s9STZw-ZrQcF8xQ';
        let map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [120.984222, 14.599512],
        zoom: 10
        });

        map.addControl(new mapboxgl.NavigationControl());
        @if ($cities->count())
            @foreach($cities as $city)
                new mapboxgl.Marker()
                .setLngLat([{{$city->longitude}}, {{ $city->latitude }}])
                .addTo(map); // add the marker to the map
            @endforeach
        @endif
    </script> --}}