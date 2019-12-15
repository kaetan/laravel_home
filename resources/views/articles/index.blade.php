@extends('template')

@section('content')

@include('_includes.entity-index', ['entityName' => 'Articles', 'entityType' => 'article'])

@endsection