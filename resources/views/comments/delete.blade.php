@extends('main')

@section('title', 'View Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMENT?</h1>

            <p>
                <strong>Name:</strong> {{ $comment->name }}
            </p>
            <p>
                <strong>Email:</strong> {{ $comment->email }}
            </p>
            <p>
                <strong>Comment:</strong> {{ $comment->comment }}
            </p>

            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                @csrf
                <input type="submit" value="Delete" class="btn btn-danger btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                {{ method_field('DELETE') }}
            </form>
        </div>
    </div>
@endsection
