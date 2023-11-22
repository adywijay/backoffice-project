<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}"></script>
    @include('authenticationV1/layout/load_css')
    <title>Login | Page</title>

</head>

<body>
    <div id="mytask-layout" class="theme-indigo">
        @yield('list_body_auth')
    </div>

    @include('authenticationV1/layout/load_js')
</body>

</html>
