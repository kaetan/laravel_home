@extends('template')

@section('layout')


    <div class="page-content__content">
        @yield('content')
    </div>

    <div class="page-content__sidebar">
        @include('_includes/common-blocks/sidebar')
    </div>

@endsection
