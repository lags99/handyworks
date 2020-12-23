@extends('layouts.admin-app')

@section('admin-content')
    <div class="row">
        <div class="col">
            <h2 class="mb-3">
                List of Cities
            </h2>
        </div>
    </div>
    @include('includes.flash')
    <div class="row my-2">
        <div class="col">
            <a href="#" data-toggle="modal" data-target="#add_city" class="btn btn-primary">Add City</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">City Name</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Latitude</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cities->count())
                        @foreach ($cities as $city)
                            <tr>
                                <td scope="col">{{ $city->name }}</td>
                                <td scope="col">{{ $city->longitude }}</td>
                                <td scope="col">{{ $city->latitude }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="add_city">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add A City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('city') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">City Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                        @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude">
                        @error('longitude')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude">
                        @error('latitude')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save City">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection