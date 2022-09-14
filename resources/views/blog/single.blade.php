@extends('main')

@section('title', "| $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image) }}" alt="" height="400" height="800">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Published in: {{ $post->category->name }}</p>
            <hr>
            <br>
        </div>
    </div>

    <div class="row"></div>
    <div class="col-md-8 col-md-2">
        <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
        @foreach ($post->comments as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=wavatar" }}" alt="" class="author-image">
                    <div class="author-name">
                        <h4>{{ $comment->name }}</h4>
                        <p class="author-time">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="comment-content">
                    {{ $comment->comment }}
                </div>
            </div>
        @endforeach
    </div>
    </div>



    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="comment-form">
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" style="width:100%">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" style="width:100%">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="comment">Comment:</label>
                                <textarea type="text" class="form-control input-lg" id="comment" name="comment" rows="3"></textarea>
                                <input type="submit" value="Add Comment" class="form-control p2 btn btn-success">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
