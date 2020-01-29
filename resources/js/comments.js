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

        var offset = $(".js-comments-block").find('.js-comment').last().attr("id").slice(8);

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
                    $loadBtn.removeClass('flex').addClass('hidden');
                    $loader.removeClass('hidden').addClass('flex');
                },

                success: function (data) {
                    if (data.html) {
                        // прикрепляем полученный html к блоку комментов
                        $(".js-comments-block").append(data.html);

                        // обновляем id последнего отображаемого коммента и передаем его в кнопку
                        offset = $('.js-comments-block').find('.js-comment').last().attr("id").slice(8);
                        $loadBtn.attr('data-offset', offset);
                        $loadBtn.removeClass('hidden').addClass('flex');
                    } else {
                        $noMoreComments.removeClass('hidden').addClass('flex');
                        $noMoreComments.fadeIn(200);
                        $noMoreComments.fadeOut(3000);
                    }
                },

                complete: function () {
                    $loader.removeClass('flex').addClass('hidden');
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
                    $('.js-comments-block').prepend(data);
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
