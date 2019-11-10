@extends('template')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-9 mx-auto">
      <a href="/" class="d-block mt-3">Back to index</a>
      <h1 class="text-center my-4">{{ $article->name }}</h1>
      <p class="lead">{{ $article->text}}</p>
    </div>
  </div>
</div>
@endsection