@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2 class="text-warning font-weight-bold my-2">
                News & Blog
            </h2>
            <div class="row my-2">
                @if ($posts->count())
                    @foreach ($posts as $post)
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
    {{ $posts->links() }}
@endsection