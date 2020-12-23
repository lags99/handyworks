@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 left">
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <div class="row justify-content-center">
                    <img class="img-fluid rounded-circle" src="{{auth()->user()->getAvatar()}}" alt="Profile Picture">
                </div>
            </div>
            <h4 class="mb-3 text-center">{{auth()->user()->full_name}}</h4>
            @if (auth()->user()->specializations->count())
                <div class="card mb-3">
                    <div class="card-header">
                        {{__('Services')}}
                    </div>
                    <div class="card-body">
                        @foreach (auth()->user()->specializations as $service)
                           <span style="font-size: 13px" class="badge @if($service->approved === "Approved") badge-success @endif @if ($service->approved === "On Review") badge-warning @endif @if ($service->approved === "Not Approve") badge-danger @endif">{{ $service->name }} P{{ $service->rate }} ({{ $service->approved }})</span>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <div class="card mb-3">
                <div class="card-header">
                    {{__('Account Status')}}
                </div>
                <div class="card-body">
                    @if (auth()->user()->status === "Not Complete")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-warning font-weight-bold">{{__('Incomplete')}}</span></p>
                    @endif
                    @if (auth()->user()->status === "Failed")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-danger font-weight-bold">{{__('Failed')}}</span></p>
                    @endif
                    @if (auth()->user()->status === "Passed")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-success font-weight-bold">{{__('Passed')}}</span></p>
                    @endif
                    @if (auth()->user()->status === "Profile Complete")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-secondary font-weight-bold">{{__('Profile Complete')}}</span></p>
                    @endif
                    @if (auth()->user()->status === "Not Accepted")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-danger font-weight-bold">{{__('Not Accepted')}}</span></p>
                    @endif
                    @if (auth()->user()->interviewed)
                        <p><strong>{{__('Interviewed')}}</strong>{{__(':')}} {{auth()->user()->interviewed}}</p>
                    @endif
                </div>
            </div>
                
            @if (auth()->user()->email || auth()->user()->phone)
                <div class="card mb-3">
                    <div class="card-header">
                        {{__('Contact Info')}}
                    </div>
                    <div class="card-body">
                        <p><strong>{{__('Email')}}</strong>{{__(':')}} {{ auth()->user()->email}}</p>
                        @if (auth()->user()->phone)
                            <p><strong>{{__('Phone')}}</strong>{{__(':')}} {{ auth()->user()->phone}}</p>
                        @endif
                    </div>
                </div>
            @endif
            @if (auth()->user()->street_address || auth()->user()->city || auth()->user()->postal_code)
                <div class="card mb-3">
                    <div class="card-header">
                        {{__('Address')}}
                    </div>
                    <div class="card-body">
                        @if (auth()->user()->street_address)
                            <p class="my-2"><strong>Address</strong>: {{ auth()->user()->street_address }}</p>
                        @endif
                        @if (auth()->user()->postal_code)
                            <p class="my-2"><strong>Postal Code</strong>: {{ auth()->user()->postal_code }}</p>
                        @endif
                        @if (auth()->user()->city)
                            <p class="my-2"><strong>City</strong>: {{ auth()->user()->city->name }}</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        
        <div class="col-md-9 right">
            @include('includes.flash')
            @if (auth()->user()->status === "Not Complete")
                <div class="alert alert-warning mb-3">
                    {{__('Please')}} <a href="{{ route('complete_profile') }}">complete your profile</a> {{__('to move on to the screening phase.')}}
                </div>
            @endif
            @if (auth()->user()->status === "Not Accepted")
                <div class="alert alert-danger mb-3">
                I'm sorry, but we cannot accept this profile.
                </div>
            @endif
            @if (auth()->user()->certificates->count())
                <div class="card mb-3">
                    <div class="card-header">
                        {{ __('Certificates / Diploma') }}
                    </div>
                    <div class="card-body">
                        <p class="my-3">Please bring these certificates in our interview, for validation.</p>
                        <div class="row">
                            @foreach (auth()->user()->certificates as $certificate)
                                <div class="col-md-4">
                                    <div>
                                        <img class="img-fluid" src="{{ asset('storage/certifications/'.$certificate->image) }}" alt="Certificate / Diploma">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <div class="card mb-3">
                    <div class="card-body">
                        We highly encourage you to upload all your certificates if you have any <a href="{{ route('complete_profile') }}">Go Back to Completing Profile</a>.
                    </div>
                </div>
            @endif
        </div>
    </div>
    

@endsection
