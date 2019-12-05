@extends('template')

@section('content')

<?php if (!empty($article)) : ?>

<div class="entity article container py-4" data-entity-type="article" data-entity-id="{{ $article->id }}">
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
                <input type="hidden" value="article" name="entity_type">
                <input type="hidden" value="{{ $article->id }}" name="entity_id">
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-9 mx-auto">
            <div id="test" class="comments">
                @include('_partials.comments', ['comments' => $comments])
            </div>

            <?php if (!empty($comments)) : ?>
            <div class="d-flex flex-row align-items-center my-4">
                <div class="">
                    <button class="btn btn-success js-load-comments ">Load more</button>
                </div>
                <div class="px-2">
                    <div id="loader" class="lds-ellipsis d-none">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="no-more-comments d-none">
                    <span class="text-success">No more comments to show!</span>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php else : ?>

<div class="container text-center py-5 mt-5">
    <p class="h4">Something went wrong!</p>
    <a href="/" class="d-block mt-3">Back to index</a>
</div>

<?php endif; ?>

@endsection