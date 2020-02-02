@extends('template')

@section('layout')


    <div class="page-content__content">
        @yield('content')
    </div>

    <div class="page-content__sidebar">
        @yield('sidebar')
    </div>

@endsection
