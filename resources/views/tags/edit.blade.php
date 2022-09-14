@extends('main')

@section('title', 'Edit Tag')

@section('content')
    <div class="row">
        <div class="co-md-8">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Name:</label>
                <textarea type="text" name="name" class="form-control" rows="1" style="resize:none;">{{ $tag->name }}</textarea>
                <input type="submit" value="Save Changes" class="form-control btn-success btn-inline-block pull-right p2">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
