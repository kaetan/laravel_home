<div id="comments" class="comments <?= !empty($commentsClass) ? $commentsClass : ''; ?>">
    <p class="comments__count">{{ $countComments }}&nbsp;комментариев</p>

    <div class="js-comments-block">
        @foreach ($comments as $comment)
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
        @endforeach
    </div>

    <div class="comments__load">
        <span class="comments__load-btn js-load-comments">Показать больше комментариев</span>

        <div class="lds-ellipsis comments__load-animation js-more-comments-loader hidden">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <span class="comments__load-text js-no-more-comments hidden">Комментарии закончились</span>
    </div>
</div>
