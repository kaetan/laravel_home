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
  <hr>
  <div class="row">
    <div class="col-9 mx-auto">
      <form action="{{ route('comment.post') }}" method="POST" class="my-3">
        @csrf
        <h5>Submit your comment!</h5>
        <textarea class="form-control mb-3" name="text" rows="2"></textarea>
        <input type="hidden" value="{{ $article->id }}" name="article_id">
        <button class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-9 mx-auto">
      @foreach (collect($article->comments)->sortByDesc('id') as $comment)
      <div class="card mb-3">
        <div class="card-body">
          <p class="card-text small text-muted">
            {{ $comment->user->name }} wrote {{ $comment->created_at->diffForHumans() }}
          </p>
          <p class="card-text lead">
            {{ $comment->text }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection