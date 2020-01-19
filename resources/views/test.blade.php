<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>
</head>

<body>

    <header class="header">
        <div class="header__wrapper container">
            <div class="logo header__logo">
                <a href="#" class="logo__link">LARAVEL HOME</a>
            </div>
    
            <nav class="main-nav header__main-nav">
                <a href="" class="main-nav__dropdown-link">|||</a>
                <div class="main-nav__dropdown-list">
                    <a href="" class="main-nav__dropdown-item">Статьи</a>
                    <a href="" class="main-nav__dropdown-item">Вопросы</a>
                    <a href="" class="main-nav__dropdown-item">О проекте</a>
                </div>
            </nav>
    
            <div class="personal header__personal">
                <a href="" class="personal__dropdown-link">|||</a>
                <div class="personal__dropdown-list">
                    <a href="" class="personal__dropdown-item">Вход</a>
                    <a href="" class="personal__dropdown-item">Регистрация</a>
    
                    {{-- <a href="" class="personal__dropdown-item">Сторож Демьянов</a>
                    <form class="personal__dropdown-item personal__dropdown-item--form" action="{{ route('logout') }}" method="POST">
                        <button class="personal__dropdown-btn" type="submit">Выход</button>
                        @csrf
                    </form> --}}
                </div>
            </div>
        </div>
    </header>


    <section class="articles container">
        @for ($i = 0; $i < 13; $i++) 
            <div class="article-card articles__article-card">
                <div class="article-card__header">
                    <img src="https://source.unsplash.com/random/300x200" alt="" class="article-card__image">
                    <h4 class="article-card__title">
                        <a href="" class="article-card__title-link">
                            <?= $i ?> Simple embedding for Unsplash photos.
                        </a>
                    </h4>
                    <p class="article-card__category">#дуроввернистену</p>
                </div>
                <div class="article-card__body">
                    <p class="article-card__preview-text">
                        Source is built for use in small, low-traffic applications. For production uses, we recommend the
                        official Unsplash API
                        which...
                    </p>
                </div>
                <div class="article-card__footer">
                    <a href="#" class="article-card__link">Читать целиком</a>
                </div>
            </div>
        @endfor
    </section>


    <footer class="footer">
        <div class="footer-wrapper container">
            <nav class="main-nav footer__main-nav">
                <a href="" class="main-nav__dropdown-link">|||</a>
                <div class="main-nav__dropdown-list">
                    <a href="" class="main-nav__dropdown-item">Статьи</a>
                    <a href="" class="main-nav__dropdown-item">Вопросы</a>
                    <a href="" class="main-nav__dropdown-item">О проекте</a>
                </div>
            </nav>
    
            <div class="logo">
                <a href="#" class="logo__link">LARAVEL HOME</a>
            </div>
    
            <div class="footer__copyright">
                <p class="footer__copyright-text">(c) 2020</p>
            </div>
        </div>
    </footer>

</body>

</html>