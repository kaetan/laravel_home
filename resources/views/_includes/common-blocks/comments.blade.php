<div id="comments" class="comments <?= !empty($commentsClass) ? $commentsClass : ''; ?>">
    <p class="comments__count">{{ $countComments }}&nbsp;комментариев</p>

    <div class="js-comments-block">
        @include('_includes/common-blocks/comments-block', ['comments' => $comments])
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
