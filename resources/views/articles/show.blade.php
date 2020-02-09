@extends('layouts.two-col')

@section('content')
    <div class="entity article" data-entity-type="article" data-entity-id="{{ $item->id }}">
        <div class="article__body">
            <div class="article__header">
                <h1 class="article__title">{{ trim(strtoupper($item->name), '.') }}</h1>
                <a href="#" class="article__author">{{ $item->user->name }}&nbsp;&nbsp;</a>
                <span class="article__date">{{ $item->created_at->diffForHumans() }}&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="#comments" class="article__comments-count"><b>{{ $countComments }}</b>&nbsp;комментариев</a>
            </div>

            <div class="article__disclosure">
                Этот пост может содержать партнерские ссылки. Пожалуйста, ознакомьтесь с политикой раскрытия информации.
            </div>

            <div class="article__social">
                <a href="#" class="article__social-link"><i class="fab fa-vk"></i></a>
                <a href="#" class="article__social-link"><i class="fab fa-twitter"></i></a>
                <span class="article__social-shares"><i class="fas fa-share-alt"></i>&nbsp;502317</span>
            </div>

            <div class="article__text js-entity-text">
                {!! $item->text!!}
            </div>

            @if (Auth::id() === $item->user->id)

                <form id="entity-edit" action="{{ route('article.update', $item->id) }}" method="POST"
                      class="article__edit js-entity-edit d-none">
                    @csrf
                    <textarea data-input-type="summernote" class="form-control my-3 d-none" name="text"
                              rows="2">{!! $item->text !!}</textarea>
                    <div class="d-flex flew-row align-items-center mt-3">
                        <button id="entity_submit_btn" class="btn btn-link js-entity-edit-submit">
                            <i class="fas fa-check mr-1"></i> Submit
                        </button>
                        <button id="entity_cancel_btn" class="btn btn-link js-entity-edit-cancel">
                            <i class="fas fa-times mr-1"></i> Cancel
                        </button>
                        <div class="px-2">
                            <div class="lds-ellipsis lds-ellipsis--blue d-none js-loader-submit">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </form>

                <button class="btn btn-link js-entity-edit-btn">
                    <i class="fas fa-pencil-alt mr-1"></i> Edit
                </button>

            @endif

            <div class="article__ps">
                Понравилась статья? Будем рады вашему <a href="#reply" class="article__ps-link">отзыву</a>!
            </div>

            <div class="article__copyright">
                © TIPBUZZ. Images and text on this website are copyright protected. Please do not post or republish without permission. If you want to republish this recipe, please link back to this post. This post may contain affiliate links. Read the disclosure policy here.
            </div>

            <div class="article__tags">
                <span class="article__tags-header">Тэги</span>
                <div class="article__tags-list">
                    <a href="#" class="article__tag">BAKED</a>
                    <a href="#" class="article__tag">COMFORT FOOD</a>
                    <a href="#" class="article__tag">DESSERTS</a>
                    <a href="#" class="article__tag">MOTHER'S DAY</a>
                    <a href="#" class="article__tag">PARTY</a>
                    <a href="#" class="article__tag">THANKSGIVING</a>
                    <a href="#" class="article__tag">VALENTINE'S DAY</a>
                </div>
            </div>

            @include('_partials/common-blocks/subscribe', ['subscribeClass' => '_in_content'])

            <div class="article__post-nav-block">
                <a href="#" class="article__post-nav-prev">
                    <span class="article__post-nav-direction">« Предыдущий пост</span><br>
                    BAVETTE STEAK
                </a>
                <a href="#" class="article__post-nav-next">
                    <span class="article__post-nav-direction">Следующий пост »</span><br>
                    ORANGE CHICKEN
                </a>
            </div>

            @include('_partials/common-blocks/reply', [
                'replyClass' => 'reply_in_article',
                'entityType' => 'article',
                'entityId' => $item->id,
                ])

            <?php  if (!empty($comments) && is_a($comments, 'Illuminate\Database\Eloquent\Collection')) : ?>
                @include('_partials/common-blocks/comments', ['commentsClass' => 'comments_in_article', 'comments' => $comments])
            <?php  endif; ?>

        </div>
    </div>
@endsection

@section('sidebar')
    @php $sidebar = $sidebar ? $sidebar : 'sidebar'; @endphp
    @include('_partials/common-blocks/' . $sidebar)
@endsection
