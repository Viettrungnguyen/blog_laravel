@extends('main')

@section('title', 'View Post')

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
        <div class="col-md-8">
            <form method="POST"  enctype="multipart/form-data" action="{{ route('posts.update', $post->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title:</label>
                    <textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none;">{{ $post->title }}</textarea>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <textarea type="text" class="form-control input-lg" id="slug" name="slug" rows="1"
                        style="resize:none;">{{ $post->slug }}</textarea>
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
                    <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea type="text" class="form-control input-lg" id="body" name="body" rows="10"
                        style="resize:none;">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <label name="featured_image">Update Image:</label>
                    <input type="file" id="featured_image" name="featured_image">
                </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd class="text-muted">{{ date('M j, Y H:ia ', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd class="text-muted">{{ date('M j, Y h:ia ', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2-multi').select2();
        });
        $(document).ready(function() {
            $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
        });
    </script>
@endsection
