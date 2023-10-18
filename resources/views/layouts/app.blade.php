<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{ url()->current() }}">
    <title>{{ config('app.name') }} -@stack('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @stack('head_style')
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body>
    @yield('content')
</body>

</html>