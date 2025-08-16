@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h2>Create Page</h2>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('pages.index') }}" class="btn btn-primary">+ All Page</a>
        </div>
        <form action="{{ route('pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $page->title }}">
            </div>
            <div class="mb-3">
                <label>Content</label>
                <textarea name="pageContent" class="form-control" rows="6">{{ $page->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
