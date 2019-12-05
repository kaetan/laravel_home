$(document).ready(function () {
    const loadBtn = $(".js-load-comments");

    if (loadBtn.length > 0) {

        // находим анимацию загрузки и сообщение о закончившихся комментах
        var loader = $("#loader");
        var noMoreComments = $(".no-more-comments");

        // получаем id статьи и id последнего отображаемого коммента
        const entity = $(".entity");
        const entityId = entity.data('entity-id');
        const entityType = entity.data('entity-type');

        var offset = $(".comments").children().last().attr("id").slice(8);

        // вешаем эвент на нажатие кнопки
        loadBtn.on('click', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                datatype: "json",
                url: `/comments/load`,
                data: {
                    type: entityType,
                    id: entityId,
                    offset: offset,
                },

                beforeSend: function () {
                    loadBtn.hide();
                    loader.removeClass('d-none');
                },

                success: function (data) {
                    if (data.html) {
                        // прикрепляем полученный html к блоку комментов
                        $(".comments").append(data.html);

                        // обновляем id последнего отображаемого коммента и передаем его в кнопку
                        offset = $(".comments").children().last().attr("id").slice(8);
                        loadBtn.attr('data-offset', offset);
                    } else {
                        noMoreComments.removeClass('d-none');
                        noMoreComments.fadeIn(200);
                        noMoreComments.fadeOut(3000);
                        loadBtn.addClass('d-none');
                    }
                },

                complete: function () {
                    loader.addClass('d-none');
                    loadBtn.show();
                }
            });
        });
    }
});
