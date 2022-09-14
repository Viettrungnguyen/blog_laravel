@extends('main')

@section('title', 'All Caegories')

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
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <th>{{ $category->name }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('categories.store') }}" method="POST">
                    <h3>New Category</h3>
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="New Category" class="form-control">
                    <input type="submit" value="Create New Category" class="form-control btn-success p2">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
        </div>
    </div>
@endsection
