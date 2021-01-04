@extends('layouts.admin-app')

@section('admin-content')
    <div class="row">
        <div class="col">
            <h2 class="mb-3">
                List of Services
            </h2>
        </div>
    </div>
    @include('includes.flash')
    <div class="row my-2">
        <div class="col">
            <a href="#" data-toggle="modal" data-target="#add_service" class="btn btn-primary">Add Service</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Service Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($services->count())
                    @foreach ($services as $service)
                        <tr >
                            <td scope="col">{{ $service->service_name }}</td>
                            <td scope="col">
                                <a href="#" data-toggle="modal" data-target="#delete_{{$service->id}}" class="btn btn-danger">Delete Service</a>
                                <div class="modal fade" tabindex="-1" role="dialog" id="delete_{{$service->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Service</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            This will be deleted from all user's profile. 
                                        </div>
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" 
                                                    data-dismiss="modal">No</button>
                                                    
                                                    <form action="{{ route('delete_service', $service) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" value="OK" class="btn btn-danger">
                                                    </form>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $services->links() }}
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="add_service">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add A Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create_service') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="service_name">Service Name</label>
                        <input type="text" class="form-control @error('service_name') is-invalid @enderror" id="service_name" name="service_name">
                        @error('service_name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save Service">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection