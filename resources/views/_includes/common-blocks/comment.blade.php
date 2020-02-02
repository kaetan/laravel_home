<div id="comment-{{ $comment->id }}" class="comments__item js-comment">
    <p class="comments__item-header">
        <span class="comments__item-author">{{ $comment->user->name }}</span>
        <a href="#comment-{{ $comment->id }}" class="comments__item-date">&nbsp;{{ $comment->created_at->diffForHumans() }}</a>
    </p>
    <div class="comments__item-body">
        <p class="comments__item-text">
            {{ $comment->text }}
        </p>
    </div>
</div>