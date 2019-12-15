@extends('template')

@section('content')

@include('_includes.entity-index', ['entityName' => 'Questions', 'entityType' => 'question'])

@endsection