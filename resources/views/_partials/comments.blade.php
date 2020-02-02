<?php  if (!empty($comments) && is_a($comments, 'Illuminate\Database\Eloquent\Collection')) : ?>

<div class="comments js-comments-block">
    @include('_partials.comments-block.comments-block', ['comments' => $comments])
</div>

<div class="d-flex flex-row align-items-center my-4">
    <div class="">
        <button class="btn btn-success js-load-comments ">Load more</button>
    </div>
    <div class="px-2">
        <div class="lds-ellipsis d-none js-more-comments-loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="js-no-more-comments d-none">
        <span class="text-success">No more comments to show!</span>
    </div>
</div>

<?php  endif; ?>
