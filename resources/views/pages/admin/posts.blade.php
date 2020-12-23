@extends('layouts.admin-app')
@section('admin-content')
    <div class="row">
        <div class="col">
            <h2 class="text-warning my-2 font-weight-bold">Your Posts</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('includes.flash')
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Comment Count') }}</th>
                        <th scope="col">{{ __('Created At') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (auth()->user()->posts->count())
                        @foreach (auth()->user()->posts as $post)
                            <tr>
                                <td scope="col">{{ $post->title }}</td>
                                <td scope="col">{{number_format( $post->comments->count()) }}</td>
                                <td scope="col">{{ $post->created_at->toFormattedDateString() }}</td>
                                <td scope="col">
                                    <div class="dropdown">
                                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('single', $post) }}">View Post</a>
                                            <a class="dropdown-item" href="{{ route('post_edit', $post) }}">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#delete_{{ $post->id }}').submit();">Delete</a>
                                        </div>
                                    </div>
                                    <form action="{{ route('post_destroy', $post) }}" id="delete_{{$post->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection