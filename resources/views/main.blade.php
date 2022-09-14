<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<body>
    @include('partials._nav')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">

        {{-- {{ Auth::check() ? 'Login' : 'Logout' }} --}}

        @include('partials._messages')

        @yield('content')

        <hr>

        @include('partials._footer')
    </div>

    @include('partials._js')

    @yield('javascript')
</body>

</html>
