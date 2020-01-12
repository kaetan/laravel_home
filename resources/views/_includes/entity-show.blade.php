<div class="entity {{ $entityType }} container py-4" data-entity-type="{{ $entityType }}"
    data-entity-id="{{ $item->id }}">
    <div class="row">
        <div class="col-9 mx-auto">
            <h1 class="text-center my-4">{{ $item->name }}</h1>

            <p class="small"><span class="text-info">{{ $item->user->name }}</span>,
                {{ $item->created_at->diffForHumans() }}</p>

            <div class="js-entity-text">{!! $item->text!!}</div>

            @if (Auth::id() === $item->user->id)

            <form id="entity-edit" action="{{ route($entityType . '.update', $item->id) }}" method="POST"
                class="js-entity-edit d-none">
                @csrf
                <textarea data-input-type="summernote" class="form-control mb-3 d-none" name="text"
                    rows="2">{!! $item->text !!}</textarea>
                <div class="d-flex flew-row align-items-center mt-3">
                    <button id="entity_submit_btn" class="btn btn-link js-entity-edit-submit">
                        <i class="fas fa-check mr-1"></i> Submit
                    </button>
                    <button id="entity_cancel_btn" class="btn btn-link js-entity-edit-cancel">
                        <i class="fas fa-times mr-1"></i> Cancel
                    </button>
                    <div class="px-2">
                        <div class="lds-ellipsis lds-ellipsis--blue d-none js-loader-submit">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
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
            <form class="js-comment-form" action="{{ route('comment.post') }}" method="POST" class="my-3">
                @csrf
                <h5>Submit your comment!</h5>
                <textarea class="form-control mb-3" name="text" rows="2"></textarea>
                <input type="hidden" value="{{ $entityType }}" name="entity_type">
                <input type="hidden" value="{{ $item->id }}" name="entity_id">
                <div class="d-flex flex-row align-items-center my-4">
                    <button class="btn btn-primary js-comment-submit-btn">Submit</button>
                    {{-- TODO: анимашку в инклуды, продумать передачу цвета --}}
                    <div class="px-2">
                        <div class="lds-ellipsis lds-ellipsis--blue d-none js-loader-submit">
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