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
                @include('_partials.comments')
            </div>
            <div class="d-flex flex-row align-items-center my-4">
                <div class="">
                    <button class="btn btn-success js-load-comments ">Load more</button>
                </div>
                <div class="px-2">
                    <div id="loader" class="lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="no-more-comments">
                    <span class="text-success">No more comments to show!</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection