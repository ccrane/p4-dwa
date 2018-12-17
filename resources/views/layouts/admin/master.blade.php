<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>

    {{-- CSS global to every page can be loaded here --}}
    <link rel="stylesheet"
          type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
          crossorigin="anonymous">
    <link href='{{ asset("css/uncorked.css") }}' rel='stylesheet'>

    {{-- CSS specific to a given page/child view can be included via a stack --}}
    @stack('head')
</head>
<body>

<header>
    {{-- Global header content, ie nav bar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Uncorked! - Admin</a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is("admin") ? 'active' : '' }}">
                    <a class="nav-link" href="/admin">Home</a>
                </li>
                <li class="nav-item {{ Request::is("admin/users*") ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/users">Users</a>
                </li>
                <li class="nav-item {{ Request::is("admin/countries*") ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/countries">Countries</a>
                </li>
                <li class="nav-item {{ Request::is("admin/wines*") ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/wines">Wines</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <select class="form-control mr-sm-2">
                    <option value='user'>User</option>
                    <option value='wine' selected>Wine</option>
                </select>
                <input class="form-control mr-sm-2" type="search" placeholder="Search any wine!" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

{{-- JS global to every page can be loaded here; jQuery included just as an example --}}
{{-- jQuery JS --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
{{-- Bootstrap JS --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"
        integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl"
        crossorigin="anonymous"></script>

{{-- App specific JS--}}
<script src='{{ asset("js/uncorked.js") }}'></script>

{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>
