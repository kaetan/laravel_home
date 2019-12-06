@foreach ($comments as $comment)
    <div id="comment-{{ $comment->id }}" class="js-comment comment card mb-3">
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
