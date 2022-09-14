@extends('main')

@section('title', 'Edit Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Name:</label>
                <textarea type="text" class="form-control input-lg" id="name" name="name" rows="1" style="resize:none;"
                    disabled>{{ $comment->name }}</textarea>
    
                <label for="email">Email:</label>
                <textarea type="text" class="form-control input-lg" id="email" name="email" rows="1" style="resize:none;"
                    disabled>{{ $comment->email }}</textarea>
    
                <label for="comment">Comment:</label>
                <textarea type="text" class="form-control input-lg" id="comment" name="comment" rows="3">{{ $comment->comment }}</textarea>
    
                <button type="submit" class="btn btn-success p2 btn-block">Updated Comment</button>
            </form>
        </div>
    </div>
@endsection
