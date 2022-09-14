@extends('main')

@section('title', 'All Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <th><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('tags.store') }}" method="POST">
                    <h3>New Tag</h3>
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="New Tag" class="form-control">
                    <input type="submit" value="Create New Tag" class="form-control btn-success p2">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
        </div>
    </div>
@endsection
