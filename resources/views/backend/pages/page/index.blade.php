@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h2>All Pages</h2>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('pages.create') }}" class="btn btn-primary">+ Create New Page</a>
            <a href="{{ route('pages.index') }}" class="btn btn-primary">+ All Page</a>
        </div>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th># Sl No</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            <a href="{{ route('pages.edit', $page) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('pages.destroy', $page) }}" method="POST" style="display:inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this page?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pages->links() }}
    </div>
@endsection
