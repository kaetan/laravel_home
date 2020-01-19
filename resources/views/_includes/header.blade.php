<header class="header">
    <div class="header__wrapper container">
        <div class="logo header__logo">
            <a href="{{ url('/') }}" class="logo__link">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <nav class="main-nav header__main-nav">
            <a href="" class="main-nav__dropdown-link">|||</a>
            <div class="main-nav__dropdown-list">
                <a href="{{ route('articles.index') }}" class="main-nav__dropdown-item">Статьи</a>
                <a href="{{ route('questions.index') }}" class="main-nav__dropdown-item">Вопросы</a>
                <a href="#" class="main-nav__dropdown-item">О проекте</a>
            </div>
        </nav>

        <div class="personal header__personal">
            <a href="" class="personal__dropdown-link">|||</a>
            <div class="personal__dropdown-list">
                @if (Auth::check())
                    <a href="#" class="personal__dropdown-item">
                        <i class="personal__icon fas fa-user"></i>{{ Auth::user()->name }}
                    </a>
                    <form class="personal__dropdown-item personal__dropdown-item--form" action="{{ route('logout') }}" method="POST">
                        <button class="personal__dropdown-btn" type="submit">Выход</button>
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="personal__dropdown-item">Вход</a>
                    <a href="{{ route('register') }}" class="personal__dropdown-item">Регистрация</a>
                @endif
            </div>
        </div>
    </div>
</header>