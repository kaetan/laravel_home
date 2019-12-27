<div class="entity {{ $entityType }} container py-4" data-entity-type="{{ $entityType }}"
    data-entity-id="{{ $item->id }}">
    <div class="row">
        <div class="col-9 mx-auto">
            <h1 class="text-center my-4">{{ $item->name }}</h1>

            <p class="small"><span class="text-info">{{ $item->user->name }}</span>,
                {{ $item->created_at->diffForHumans() }}</p>

            <div class="js-entity-text">
                <p class="lead">{{ $item->text}}</p>
            </div>

            @if (Auth::id() === $item->user->id)

            <form id="entity-edit" action="{{ route($entityType . '.update', $item->id) }}" method="POST"
                class="js-entity-edit d-none">
                @csrf
                <textarea class="form-control mb-3" name="text" rows="2">{{ $item->text}}</textarea>
                <button id="entity_submit_btn" class="btn btn-link mt-3 js-entity-edit-submit">
                    <i class="far fa-save mr-1"></i> Submit
                </button>
            </form>

            <button class="btn btn-link js-entity-edit-btn">
                <i class="fas fa-pencil-alt mr-1"></i> Edit
            </button>

            @endif

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-9 mx-auto">
            <form id="comment_form" action="{{ route('comment.post') }}" method="POST" class="my-3">
                @csrf
                <h5>Submit your comment!</h5>
                <textarea class="form-control mb-3" name="text" rows="2"></textarea>
                <input type="hidden" value="{{ $entityType }}" name="entity_type">
                <input type="hidden" value="{{ $item->id }}" name="entity_id">
                <div class="d-flex flex-row align-items-center my-4">
                    <button id="comment_submit_btn" class="btn btn-primary">Submit</button>
                    {{-- TODO: анимашку в инклуды, продумать передачу цвета --}}
                    <div class="px-2">
                        <div id="loader-submit" class="lds-ellipsis lds-ellipsis--blue d-none">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
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