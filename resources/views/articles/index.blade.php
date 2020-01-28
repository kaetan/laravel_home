@extends('template')

@section('content')

<section class="articles">
    <div class="content-wrapper my-container">
        @include('articles/index/intro')
        <div class="articles__wrapper">
            @foreach ($items as $item)
                @include('articles/index/article-card', ['item' > $item])
            @endforeach
        </div>
        @include('articles/index/outro')
    </div>
</section>

@endsection
