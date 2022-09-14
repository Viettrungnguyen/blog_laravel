@extends('main')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-block btn-success btn-h1-spacing">Create A New Post</a>
        </div>

        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <th>{{ $post->title }}</th>
                            <th>{!! substr($post->body, 0, 50) !!} {{ strlen($post->body) > 50 ? '...' : '' }}</th>
                            <th>{{ date(' j M Y, H:i', strtotime($post->created_at)) }}</th>
                            <th>{{ date(' j M Y, H:i', strtotime($post->updated_at)) }}</th>
                            <th>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="btn btn-inline-block btn-success">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="btn btn-inline-block btn-primary">Edit</a>

                                    <input type="submit" value="Delete" class="btn btn-danger btn-inline-block">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    {{ method_field('DELETE') }}
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection
