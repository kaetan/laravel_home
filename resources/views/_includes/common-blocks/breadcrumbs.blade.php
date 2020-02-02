<div class="breadcrumbs">
    <div class="my-container">
        <a href="#" class="breadcrumbs__link">Все статьи&nbsp;&nbsp;/&nbsp;&nbsp;</a>
        <a href="#" class="breadcrumbs__link">Вкусности&nbsp;&nbsp;/&nbsp;&nbsp;</a>
        @if (isset($item->name))
        <span class="breadcrumbs__title">{{ $item->name }}</span>
        @endif
    </div>
</div>
