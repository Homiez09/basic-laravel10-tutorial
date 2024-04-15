@extends('layouts.app')

@section('title', 'blogs')

@section('content')
    <h2>blogs</h2>
    <hr>
    @if (count($blogs) > 0)
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Title</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr class="text-center">
                        <td>{{ $blog->title }}</td>
                        {{-- <td>{{ Str::limit($blog->content, 50) }}</td> --}}
                        <td>
                            @if ($blog->status)
                                <a href="{{ Route('change', $blog->id) }}" class="btn btn-success">Published</a>
                            @else
                                <a href="{{ Route('change', $blog->id) }}" class="btn btn-secondary">Draft</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ Route('edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="{{ Route('delete', $blog->id) }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure?\n{{ $blog->title }}')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
    @else
        <div class="alert alert-danger text-center">
            No blogs found
        </div>
    @endif
@endsection
