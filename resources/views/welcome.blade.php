@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h2>Blogs</h2>
    <hr>
    @foreach ($blogs as $blog)
        <h3>{{ $blog->title }}</h3>
        <p>{!! Str::limit($blog->content, 100) !!}</p>
        <a href="{{ route('detail', $blog->id) }}">Read more</a>
        <hr>
    @endforeach
@endsection
