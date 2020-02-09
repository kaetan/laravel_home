<div class="sidebar">

    @include('_partials/common-blocks/subscribe', ['subscribeClass' => '_in_sidebar'])

    <?php if (isset($topArticles)): ?>
        <div class="sidebar__popular">
            <p class="sidebar__popular-header">Лучшее за неделю</p>
            <div class="sidebar__popular-wrapper">
                @foreach ($topArticles as $item)
                    @include('articles/index/article-card', ['item' => $item, 'articleCardClass' => 'article-card_in_sidebar'])
                @endforeach
            </div>
        </div>
    <?php endif; ?>

    @include('_partials/common-blocks/search', ['searchClass' => 'search_in_sidebar'])

</div>
