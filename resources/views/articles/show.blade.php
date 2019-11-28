@extends('template')

@section('content')
<div id="article-{{ $article->id }}" class="article container py-4">
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
            <div id="test" class="comments">
                {!! $view !!}
            </div>
            <div class="my-4">
                <button class="btn btn-success js-load-comments">Load more</button>
                <img id="loader" class="js-loader-gif my-2 mx-auto d-none" src="/img/ajax-loader.gif" alt="">
            </div>
        </div>
    </div>
</div>
@endsection