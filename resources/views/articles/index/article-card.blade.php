@if ($item)
    <div class="article-card articles__article-card">
        <div class="article-card__header">
            <a href="{{ route('article.show', $item->id) }}" class="">
                <img src="https://source.unsplash.com/random/300x200" alt="" class="article-card__image">
            </a>
            <h4 class="article-card__title">
                <a href="{{ route('article.show', $item->id) }}" class="article-card__title-link">
                    {{ $item->name }}
                </a>
            </h4>
            <p class="article-card__category">Путешествия и отдых</p>
        </div>
        <div class="article-card__body">
            <p class="article-card__preview-text">
                {{ substr(strip_tags($item->text), 0, 100) }}...
            </p>
            <a href="{{ route('article.show', $item->id) }}" class="article-card__link">Читать целиком</a>
        </div>
    </div>
@endif
