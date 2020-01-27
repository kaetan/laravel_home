@extends('template')

@section('content')

<section class="articles">

    @include('articles/index/intro')

    <div class="articles__wrapper my-container">
        @foreach ($items as $item)
            @include('articles/index/article-card', ['item' > $item])
        @endforeach
    </div>

    @include('articles/index/outro')

</section>

@endsection
