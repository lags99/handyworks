@extends('layouts.app')
@section('content')
    <h2 class="my-2 text-warning font-weight-bold">{{ $post->title }}</h2>
    <p class="my-2 lead">Posted In <span class="text-warning">{{ $post->created_at->toFormattedDateString() }}</span> by <span class="text-warning">{{ $post->admin->username }}</span></p>
    <article class="my-4">
        {!! $post->body !!}
    </article>
    @if ($post->comments->count())
        <div class="row my-4">
            <div class="col">
                <h3 class="text-warning font-weight-bold my-2">{{ number_format($post->comments->count()) }} {{ Str::plural('Comment', $post->comments->count()) }}</h3>
                @foreach ($post->comments as $comment)
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-warning font-weight-bold my-2">{{ $comment->name }} - {{ $comment->email }}</h6>
                            <p>
                                {{ $comment->body }}
                            </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @guest
        <form action="{{ route('add_comment', $post) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name">
                @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="@error('email') is-invalid @enderror form-control" id="email">
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
             @error('body')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit Comment">
        </div>
    </form>
    @endguest

@endsection