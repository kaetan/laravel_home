<div class="personal <?= !empty($personalClass) ? $personalClass : ''; ?>">
    <div class="personal__dropdown-link jsDropdownTrigger"><i class="personal__icon fas fa-user fa-3x"></i></div>
    <div class="personal__dropdown-list jsDropdownList">
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
