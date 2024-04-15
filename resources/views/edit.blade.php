@extends('layouts.app')

@section('title', "edit $blog->id")

@section('content')
    <h2>form</h2>
    <hr>
    <form method="POST" action="{{ route('update', $blog->id) }}">
        @csrf
        <div class="flex form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
        </div>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="flex form-group">
            <label for="content">Content</label>
            <textarea name="content" cols="30" rows="5" class="form-control" id="content">{{ $blog->content }}</textarea>
        </div>
        @error('content')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('blog') }}" class="btn btn-success mt-3">blogs</a>
    </form>

@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
