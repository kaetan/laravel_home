@extends('template')

@section('content')

@include('_includes.entity-show', ['entityName' => 'Articles', 'entityType' => 'article'])

@endsection