@extends('backend.layout.app')

@section('content')
    <div class="container">
        <h2>Create Page</h2>
        <div class="d-flex justify-content-between align-items-center">
            
            <a href="{{ route('pages.index') }}" class="btn btn-primary">+ All Page</a>
        </div>
        <form action="{{ route('pages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Content</label>
                <textarea name="pageContent" class="form-control" rows="6" id="editor"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
