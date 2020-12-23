@extends('layouts.admin-app')

@section('admin-content')
    <div class="row my-2">
        <div class="col">
                <h2 class="text-warning my-2 font-weight-bold">Edit Post</h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            <form action="{{ route('post_update', $post) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ $post->title }}" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control ckeditor @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
                @error('body')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection