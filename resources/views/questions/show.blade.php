@extends('layouts.one-col')

@section('content')

@include('_partials.entity-show', ['entityName' => 'Questions', 'entityType' => 'question'])

@endsection
