$(document).ready(function () {

    const $loadBtn = $(".js-load-comments");

    if ($loadBtn.length) {

        // находим анимацию загрузки и сообщение о закончившихся комментах
        var $loader = $('.js-more-comments-loader');
        var $noMoreComments = $('.js-no-more-comments');

        // получаем id статьи и id последнего отображаемого коммента
        const entity = $(".entity");
        const entityId = entity.data('entity-id');
        const entityType = entity.data('entity-type');

        var offset = $(".comments").find('.js-comment').last().attr("id").slice(8);

        // вешаем эвент на нажатие кнопки
        $loadBtn.on('click', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                datatype: 'json',
                url: '/comments/load',
                data: {
                    type: entityType,
                    id: entityId,
                    offset: offset,
                },

                beforeSend: function () {
                    $loadBtn.hide();
                    $loader.removeClass('d-none');
                },

                success: function (data) {
                    if (data.html) {
                        // прикрепляем полученный html к блоку комментов
                        $(".comments").append(data.html);

                        // обновляем id последнего отображаемого коммента и передаем его в кнопку
                        offset = $('.comments').find('.js-comment').last().attr("id").slice(8);
                        $loadBtn.attr('data-offset', offset);
                    } else {
                        $noMoreComments.removeClass('d-none');
                        $noMoreComments.fadeIn(200);
                        $noMoreComments.fadeOut(3000);
                        $loadBtn.addClass('d-none');
                    }
                },

                complete: function () {
                    $loader.addClass('d-none');
                    $loadBtn.show();
                }
            });
        });
    }

    // Добавление коммента и его подгрузка
    const $submitBtn = $('.js-comment-submit-btn');

    if ($submitBtn.length) {
        var $form = $('.js-comment-form');
        var $loaderSub = $('.js-loader-submit');
        $form.on('submit', function (event) {
            //
            event.preventDefault();
            var text = $form.find('textarea').val();
            var entity_type = $form.find('input[name="entity_type"]').val();
            var entity_id = $form.find('input[name="entity_id"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/comment',
                data: {
                    text: text,
                    entity_type: entity_type,
                    entity_id: entity_id,
                    is_ajax: true,
                },

                beforeSend: function () {
                    $submitBtn.hide();
                    $loaderSub.removeClass('d-none');
                },

                success: function (data) {
                    $form[0].reset();
                    $('.comments').prepend(data);
                    toastr.success('Comment posted!');
                },

                complete: function () {
                    $loaderSub.addClass('d-none');
                    $submitBtn.show();
                }
            });

        });
    }
});
