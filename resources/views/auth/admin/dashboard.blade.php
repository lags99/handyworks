@extends('layouts.admin-app')
@section('admin-content')
    <div class="row mt-3">
        <div class="col">

            <h2 class="mb-3">{{ __('List of Applicants') }}</h2>
            @include('includes.schedule-error')
            @include('includes.flash')
            <div class="card">
                <div class="card-body"> 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Applicant Name') }}</th>
                                <th scope="col">{{ __('Account Creation Date') }}</th>
                                <th scope="col">{{ __('Account Status') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->created_at->toDayDateTimeString()}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('view_user', $user) }}">View Profile</a>
                                                    @if ($user->status === "Profile Complete")
                                                        @if (!$user->interview)
                                                            <a href="#" data-toggle="modal" data-target="#sched_{{ $user->id }}" class="dropdown-item">Schedule Interview</a>
                                                            <a href="#" data-target="#not_accept_{{ $user->id }}" data-toggle="modal" class="dropdown-item">Do Not Accept</a>
                                                        @endif
                                                        <a href="#" data-toggle="modal" data-target="#mark_{{ $user->id }}" class="dropdown-item">Mark As Interviewed</a>
                                                    @endif
                                                   
                                                </div>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="sched_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Schedule Interview</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('set_interview', $user) }}" id="sched_form" method="POST">
                                                    @csrf
                                                        <div class="form-group">
                                                            <label>Set Date</label>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="number" name="month"
                                                                    class="form-control @error('month') is-invalid @enderror" placeholder="Month">
                                                                </div>
                                                                <div class="col">
                                                                    <input type="number" name="day" 
                                                                    class="form-control @error('day') is-invalid @enderror" placeholder="Day">
                                                                </div>
                                                                <div class="col">
                                                                    <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" placeholder="Year">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Set Time</label>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="number" name="hour"
                                                                    class="form-control @error('hour') is-invalid @enderror" placeholder="Hour">
                                                                </div>
                                                                <div class="col">
                                                                    <input type="number" name="minute" 
                                                                    class="form-control @error('minute') is-invalid @enderror" placeholder="Minute">
                                                                </div>
                                                                <div class="col">
                                                                    <select class="form-control" name="ampm">
                                                                        <option value="AM">AM</option>
                                                                        <option value="PM" selected>PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button onclick="event.preventDefault(); document.querySelector('#sched_form').submit();" type="button" class="btn btn-primary">Set Interview</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal fade" id="mark_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Mark As Interviewed
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('interviewed', $user) }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="status" value="Failed">
                                                            <input type="submit" class="btn btn-danger" value="Mark As Failed">
                                                        </form>
                                                        <form action="{{ route('interviewed', $user) }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="status" value="Passed">
                                                            <input type="submit" class="btn btn-primary" value="Mark As Passed">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="not_accept_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do not accept this user's profile?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="{{ route('not_accepted', $user) }}" method="POST">
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger" value="Yes">
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            
        </div>
    </div>
@endsection