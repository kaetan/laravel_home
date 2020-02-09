@extends('layouts.one-col')

@section('content')

@include('_partials.entity-index', ['entityName' => 'Questions', 'entityType' => 'question'])

@endsection
