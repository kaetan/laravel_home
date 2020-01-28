$(document).ready(function() {
    // В одном родительском блоке может быть активен лишь один выпадающий список.

    // При нажатии на любой из триггеров в его родительском блоке (класс jsDropdownParent)
    // выполняется проверка ближайшего к триггеру ( .next() ) выпадающего списка:
    // - если он hidden, то ВСЕ списки родительского блока задаются hidden, а затем
    //   ближайший список задается visible.
    // - если он visible, то ВСЕ списки родительского блока задаются hidden.
    var $triggers = $('.jsDropdownTrigger');
    if ($triggers.length) {
        $triggers.on('click', function(e) {
            e.preventDefault();
            // Находим кликнутый триггер и соответстующий ему выпадающий список
            var $currentTrigger = $(e.currentTarget);
            var $currentList = $currentTrigger.next('.jsDropdownList');

            // Находим родительский блок триггера и все его списки
            var $parentBlock = $currentTrigger.closest('.jsDropdownParent');
            var $parentLists = $parentBlock.find('.jsDropdownList');

            if ($currentList.css('visibility') === 'hidden') {
                $parentLists.css('visibility', 'hidden');
                $currentList.css('visibility', 'visible');
            } else {
                $parentLists.css('visibility', 'hidden');
            }
        });
    }
});
