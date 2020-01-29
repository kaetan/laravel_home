@extends('layouts.one-col')

@section('content')

<section class="articles">
    <div class="my-container">
        @include('articles/index/intro')
        <div class="articles__wrapper">
            @foreach ($items as $item)
                @include('articles/index/article-card', ['item' => $item, 'articleCardClass' => 'article-card_in_articles'])
            @endforeach
        </div>
        @include('articles/index/outro')
    </div>
</section>

@endsection
