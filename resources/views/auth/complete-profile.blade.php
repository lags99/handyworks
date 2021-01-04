@extends('layouts.app')
@section('content')
@if (auth()->user()->schedule)
    @php
        $sched = explode(' ', str_replace('-', ' ', auth()->user()->schedule));
    @endphp
@endif
    <div class="col-md-8 offset-md-2">
        @include('includes.flash')
        <h3 class="my-3">{{__('Please Complete Your Profile')}}</h3>
        <div class="card mb-5">
            <div class="card-header">{{__('Upload Profile Picture')}}</div>
            <div class="card-body">
                <div style="width: 130px" class="my-3">
                    <img style="" class="img-fluid rounded-circle" src="{{auth()->user()->getAvatar() }}" alt="Current Profile">
                </div>
                <form action="{{route('upload_profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="file" class=" @error('profile_picture') is-invalid @enderror form-control" name="profile_picture">
                        @error('profile_picture')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="submit" value="Upload Photo" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">{{__('Personal Information')}}</div>
            <div class="card-body">
                <form action="{{ route('add_personal') }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="street_address">{{__('Street Address')}}</label>
                        <input type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" id="street_address" value="@error('street_address') {{old('street_address') }}@enderror {{auth()->user()->street_address}}">
                        @error('street_address')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="postal_code">{{__('Postal Code')}}</label>
                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" id="postal_code" value="@error('postal_code') {{old('postal_code') }}@enderror {{auth()->user()->postal_code}}">
                        @error('postal_code')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">{{__('Phone Number')}}</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="@error('phone') {{old('phone') }}@enderror {{auth()->user()->phone}}">
                        @error('phone')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <input type="submit" value="Update Information" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">{{__('Add Your Certificates ')}}</div>
            <div class="card-body">
                <form action="{{ route('add_certificate') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if (auth()->user()->certificates->count())
                        <p class="my-3">Please bring these certificates in our interview, for validation.</p>
                        <div class="row">
                            @foreach (auth()->user()->certificates as $certificate)
                            <div style="width: 130px" class="my-3 mr-3">
                                <img style="" class="img-fluid" src="{{ asset('storage/certifications/'.$certificate->image) }}" alt="Certificate">
                            </div>
                        @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="certification">{{__('Certification / Diploma')}}</label>
                        <input type="file" class="form-control @error('certification') is-invalid @enderror" name="certification" id="certification">
                        @error('certification')
                            <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    
                    <input type="submit" value="Update Information" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">{{__('Add Services')}}</div>
            <div class="card-body">
                <form action="{{ route('service.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="specialization">{{__('Choose Service')}}</label>
                        <select class="form-control @error('name') is-invalid @enderror" name="name" id="specialization">
                           <option selected disabled>- Select</option>
                           @if ($services->count())
                               @foreach ($services as $service)
                                   <option value="{{ $service->service_name }}">{{ $service->service_name }}</option>
                               @endforeach
                           @endif
                        </select>                       
                        @error('name')
                            <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rate">{{__('Daily Rate')}}</label>
                         <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">P</span>
                        </div> 
                        <input type="text" class="form-control @error('rate') is-invalid  @enderror" id="rate" name="rate">        
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                        <input type="hidden" class="@error('rate') is-invalid  @enderror">         
                        @error('rate')
                            <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                    
                    <input type="submit" value="Add Service" class="btn btn-primary">
                </form>
                 @if (auth()->user()->specializations->count())
                <div class="my-3">
                    <h2 class="my-1">Your Services</h2>
                        @foreach (auth()->user()->specializations as $service)
                             <span style="font-size: 13px" class="badge @if($service->approved === "Approved") badge-success @endif @if ($service->approved === "On Review") badge-warning @endif @if ($service->approved === "Not Approved") @endif">{{ $service->name }} P{{ $service->rate }}</span>
                        @endforeach
                </div>
                @endif
            </div>
        </div>
        
        <div class="mb-5 row">
            <div class="col-xs-3">
                <a href="{{route('home')}}" class=" font-weight-bold text-warning">I'll do it later.</a>
            </div>
            <div class="col d-flex justify-content-end">
                <form action="{{ route('complete_profile') }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="submit" value="Profile Done" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection