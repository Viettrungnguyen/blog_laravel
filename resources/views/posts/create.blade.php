@extends('main')

@section('title', 'Create New Post')

@section('stylesheets')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.tinytextarea',
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                'wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offet-2">
            <h1>Create New Post</h1>
            <hr>
            <form enctype="multipart/form-data" method="POST" action="{{ route('posts.store') }}">
                <div class="form-group">
                    <label name="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label name="slug">Slug:</label>
                    <input type="text" id="slug" name="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category: </label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tag: </label>
                    <select name="tags[]" class="form-control select2-multi" multiple="multiple" style="width: 100%">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label name="body">Post Body:</label>
                    <textarea id="body" name="body" rows="10" class="form-control tinytextarea"></textarea>
                </div>

                <div class="form-group">
                    <label name="featured_image">Post Image:</label>
                    <input type="file" id="featured_image" name="featured_image">
                </div>

                <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2-multi').select2();
        });
    </script>
@endsection
