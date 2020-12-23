@extends('layouts.admin-app')

@section('admin-content')
    <div class="row">
        <div class="col-md-3 left">
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <div class="row justify-content-center">
                    <img class="img-fluid rounded-circle" src="{{ $user->getAvatar() }}" alt="Profile Picture">
                </div>
            </div>
            <h4 class="mb-3 text-center">{{$user->first_name}} {{$user->last_name}}</h4>
            <div class="card mb-3">
                <div class="card-header">
                    {{__('Actions')}}
                </div>
                <div class="card-body">
                    <a href="" class="btn font-weight-bold text-success">Schedule Interview</a>
                    <a href="" class="btn font-weight-bold text-secondary">Mark As Interviewed</a>
                    <a href="" class="btn font-weight-bold text-danger">Delete User</a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    {{__('Account Status')}}
                </div>
                <div class="card-body">
                    @if ($user->status === "Not Complete")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-warning font-weight-bold">{{__('Incomplete')}}</span></p>
                    @endif
                    @if ($user->status === "Failed")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-danger font-weight-bold">{{__('Failed')}}</span></p>
                    @endif
                    @if ($user->status === "Passed")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-success font-weight-bold">{{__('Passed')}}</span></p>
                    @endif
                    @if ($user->status === "Profile Complete")
                        <p><strong>{{__('Profile Status')}}</strong>{{__(':')}} <span class="text-secondary font-weight-bold">{{__('Profile Complete')}}</span></p>
                    @endif
                    @if ($user->interviewed)
                        <p><strong>{{__('Interviewed')}}</strong>{{__(':')}} {{$user->interviewed}}</p>
                    @endif
                </div>
            </div>
             @if ($user->email || $user->phone)
                <div class="card mb-3">
                    <div class="card-header">
                        {{__('Contact Info')}}
                    </div>
                    <div class="card-body">
                        <p><strong>{{__('Email')}}</strong>{{__(':')}} {{ $user->email}}</p>
                        @if ($user->phone)
                            <p><strong>{{__('Phone')}}</strong>{{__(':')}} {{ $user->phone}}</p>
                        @endif
                    </div>
                </div>
            @endif
             @if ($user->street_address || $user->postal_code || $user->city)
                <div class="card mb-3">
                    <div class="card-header">
                        {{__('Address')}}
                    </div>
                    <div class="card-body">
                        @if ($user->street_address)
                            <p class="my-2"><strong>Address</strong>: {{ $user->street_address }}</p>
                        @endif
                        @if ($user->city)
                            <p class="my-2"><strong>City</strong>: {{ $user->city->name }}</p>
                        @endif

                        @if ($user->postal_code)
                            <p class="my-2"><strong>Postal Code</strong>: {{ $user->postal_code }}</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        
        <div class="col-md-9 right">
            @if ($user->specializations->count())
                <div class="card mb-3">
                <div class="card-header">
                    {{ __('Services') }}
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($user->specializations as $service)
                            <li class="list-group-item">
                                <p><strong>Service</strong>: {{$service->name}} <strong>{{ $service->approved === "Approved" ? "Approved" : "Requested"}} Rate</strong>:  P{{ $service->rate }} @if ($user->status === "Profile Complete")
                                    @if ($service->approved === "On Review")
                                   
                                        <button data-toggle="modal" data-target="#approve_{{ $service->id }}" class="btn btn-primary btn-sm">Approve</button> 
                                   
                                        <button data-toggle="modal" data-target="#not_approve_{{ $service->id }}" class="btn btn-danger btn-sm">Not Approve</button>
                                
                                        <div class="modal fade" id="approve_{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-body">
                                                    Do you really want to approve this?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" 
                                                    data-dismiss="modal">No</button>
                                                    
                                                    <form action="{{ route('set_approved', $service) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="approved" value="Approved">
                                                        @method('put')
                                                        <input type="submit" value="Yes" class="btn btn-primary">
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div> 
                                        <div class="modal fade" id="not_approve_{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-body">
                                                    Do you not approve?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" 
                                                    data-dismiss="modal">No</button>
                                                    
                                                    <form action="{{ route('set_approved', $service) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="approved" value="Not Approve">
                                                        <input type="submit" value="Yes" class="btn btn-primary">
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div> 
                                        @endif
                                    @if ($service->approved === "Not Approve")
                                   
                                        <button data-toggle="modal" data-target="#approve_{{ $service->id }}" class="btn btn-primary btn-sm">Approve</button> 
                                
                                        <div class="modal fade" id="approve_{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-body">
                                                    Do you really approve this?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" 
                                                    data-dismiss="modal">No</button>
                                                    
                                                    <form action="{{ route('set_approved', $service) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="approved" value="Approved">
                                                        @method('put')
                                                        <input type="submit" value="Yes" class="btn btn-primary">
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div> 
                                       
                                        @endif
                                    @if ($service->approved === "Approved")
                                   
                                        <button data-toggle="modal" data-target="#not_approve_{{ $service->id }}" class="btn btn-danger btn-sm">Not Approve</button>
                                

                                        <div class="modal fade" id="not_approve_{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-body">
                                                    Do you not approve?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" 
                                                    data-dismiss="modal">No</button>
                                                    
                                                    <form action="{{ route('set_approved', $service) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="approved" value="Not Approve">
                                                        <input type="submit" value="Yes" class="btn btn-primary">
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div> 
                                        @endif
                                @endif</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @if ($user->certificates->count())
                <div class="card mb-3">
                    <div class="card-header">
                        {{ __('Certificates / Diploma') }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($user->certificates as $certificate)
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
                        No certificates added
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
