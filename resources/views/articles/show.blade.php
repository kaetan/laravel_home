@extends('template')

@section('content')
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
            @include('_partials.comments', ['comments' => $comments])
        </div>
    </div>
</div>
@endsection
