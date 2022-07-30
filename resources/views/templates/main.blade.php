<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Customer</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Crud Customer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link " href="{{ route('home') }}">Home</a>
                    <a class="nav-link " href="{{ route('customerIndex') }}">Customer</a>
                    <a class="nav-link " href="{{ route('categoryIndex') }}">Category</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="nav-link text-danger btn " type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
