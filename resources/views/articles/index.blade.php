@extends('template')

@section('content')
<div class="container">
  <h1 class="text-center my-4">Recent Articles</h1>
  @foreach ($articles as $article)
  <div class="card mb-2">
    <div class="card-body py-1">
      <div class="card-title">
        <a class="h4" href="{{ route('article.show', $article->id) }}">
          {{ $article->name }}
        </a>
      </div>
      <div class="card-text">
        <p class="text-muted text-wrap">{{ substr($article->text, 0, 100) }}...</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection