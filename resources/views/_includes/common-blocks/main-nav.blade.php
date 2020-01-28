<nav class="main-nav <?= !empty($navClass) ? $navClass : ''; ?>">
    <a href="" class="main-nav__dropdown-link jsDropdownTrigger"><i class="main-nav__icon fas fa-bars fa-3x"></i></a>
    <div class="main-nav__dropdown-list jsDropdownList">
        <a href="{{ route('articles.index') }}" class="main-nav__dropdown-item">Статьи</a>
        <a href="{{ route('questions.index') }}" class="main-nav__dropdown-item">Вопросы</a>
        <a href="#" class="main-nav__dropdown-item">О проекте</a>
    </div>
</nav>
