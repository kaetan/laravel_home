<footer class="footer">
    <div class="footer__wrapper my-container">
        <nav class="main-nav footer__main-nav">
            <a href="" class="main-nav__dropdown-link">|||</a>
            <div class="main-nav__dropdown-list">
                <a href="{{ route('articles.index') }}" class="main-nav__dropdown-item">Статьи</a>
                <a href="{{ route('questions.index') }}" class="main-nav__dropdown-item">Вопросы</a>
                <a href="#" class="main-nav__dropdown-item">О проекте</a>
            </div>
        </nav>

        <div class="logo footer__logo">
            <a href="{{ url('/') }}"><img class="logo__img" src="img/logo.png" alt=""></a>
        </div>

        <div class="footer__copyright">
            <p class="footer__copyright-text">г. Ъск, ул. Пушкина,<br>дом Колотушкина<br>(c) 2020</p>
        </div>
    </div>
</footer>
