@extends('template')

@section('content')

<section class="articles my-container">
    @foreach ($items as $item)
        <div class="article-card articles__article-card">
            <div class="article-card__header">
                <img src="https://source.unsplash.com/random/300x200" alt="" class="article-card__image">
                <h4 class="article-card__title">
                    <a href="{{ route('article.show', $item->id) }}" class="article-card__title-link">
                        {{ $item->name }}
                    </a>
                </h4>
                <p class="article-card__category">#дуроввернистену</p>
            </div>
            <div class="article-card__body">
                <p class="article-card__preview-text">
                    {{ substr(strip_tags($item->text), 0, 100) }}...
                </p>
            </div>
            <div class="article-card__footer">
                <a href="{{ route('article.show', $item->id) }}" class="article-card__link">Читать целиком</a>
            </div>
        </div>
    @endforeach
</section>

@endsection
