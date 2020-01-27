<header class="header">
    <div class="header__wrapper my-container">
        @include('_includes/common-blocks/logo', ['logoClass' => 'header__logo'])

        @include('_includes/common-blocks/main-nav', ['navClass' => 'header__main-nav'])

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
