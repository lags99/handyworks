@extends('layouts.admin-app')
@section('admin-content')
    <h2 class="mb-3">
        Scheduled Interviews
    </h2>
    @include('includes.flash')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Applicant Name</th>
                        <th scope="col">Interview Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($interviews->count())
                        @foreach ($interviews as $interview)
                            <td scope="col">{{ $interview->user->full_name }}</td>
                            <td scope="col">{{ $interview->interview_date()->toDayDateTimeString() }}</td>
                            <td scope="col">{{ $interview->status }}</td>
                            <td>
                                @if ($interview->status === "On Queue")
                                    <div class="dropdown">
                                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="#" data-toggle="modal" data-target="#mark_{{ $interview->user->id }}" class="dropdown-item">Mark As Interviewed</a>
                                        
                                    </div>
                                </div>
                                 <div class="modal fade" id="mark_{{ $interview->user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('interviewed', $interview->user) }}" method="POST">
                                                    @csrf
                                                     @method('put')
                                                    <input type="hidden" name="status" value="Failed">
                                                    <input type="submit" class="btn btn-danger" value="Mark As Failed">
                                                </form>
                                                <form action="{{ route('interviewed', $interview->user) }}" method="POST">
                                                    @csrf
                                                     @method('put')
                                                    <input type="hidden" name="status" value="Passed">
                                                    <input type="submit" class="btn btn-primary" value="Mark As Passed">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $interviews->links() }}
        </div>
    </div>
@endsection