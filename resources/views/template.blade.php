<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Home</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/static.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex-wrapper">
        @include('_partials.header')

        <div class="screen-width-bg screen-width-bg_whitesmoke">
            <div class="my-container">
                @include('_partials/common-blocks/breadcrumbs')

            </div>
        </div>

        <div class="page-content my-container">
            @yield('layout')
        </div>

        <div class="screen-width-bg screen-width-bg_whitesmoke">
            <div class="my-container">
                @include('_partials/common-blocks/subscribe')
            </div>
        </div>

        @include('_partials.footer')
    </div>
</body>

</html>
