@extends('layouts.one-col')

@section('content')

@include('_includes.entity-show', ['entityName' => 'Questions', 'entityType' => 'question'])

@endsection
