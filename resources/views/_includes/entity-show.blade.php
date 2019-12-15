<div class="entity {{ $entityType }} container py-4" data-entity-type="{{ $entityType }}"
    data-entity-id="{{ $item->id }}">
    <div class="row">
        <div class="col-9 mx-auto">
            <a href="{{ route($entityType . 's.index') }}" class="d-block mt-3">Back to {{ $entityName }}</a>
            <h1 class="text-center my-4">{{ $item->name }}</h1>
            <p class="lead">{{ $item->text}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9 mx-auto">
            <form action="{{ route('comment.post') }}" method="POST" class="my-3">
                @csrf
                <h5>Submit your comment!</h5>
                <textarea class="form-control mb-3" name="text" rows="2"></textarea>
                <input type="hidden" value="{{ $entityType }}" name="entity_type">
                <input type="hidden" value="{{ $item->id }}" name="entity_id">
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php if (isset($error)) : ?>
    <div class="row">
        <div class="col-9 mx-auto">
            {{ $error }}
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-9 mx-auto">
            @include('_partials.comments', ['comments' => $comments])
        </div>
    </div>
</div>