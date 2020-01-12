$(document).ready(function () {

    // Находим всю информацию о сущности
    const entity = $(".entity");
    const entityId = entity.data('entity-id');
    const entityType = entity.data('entity-type');

    // Блок с текстом сущности
    var $entityTextBlock = $('.js-entity-text');
    var entityTextBlockValue = $entityTextBlock.html();
    // Форма для редактирования текста сущности
    var $entityForm = $('.js-entity-edit');
    // <textarea> из формы
    var $entityTextarea = $entityForm.find('textarea');
    // Блок текста в summernote
    var $summerTextBlock = $('.note-editable');
    // Кнопка вызова формы
    var $entityEditBtn = $('.js-entity-edit-btn');
    // Кнопка отправки формы
    var $entityEditSubmit = $('.js-entity-edit-submit');
    // Кнопка отмены редактирования
    var $entityEditCancel = $('.js-entity-edit-cancel');
    // Анимация загрузки
    var $entityEditLoader = $entityForm.find('.js-loader-submit');

    if ($entityEditBtn.length) {
        $entityEditBtn.on('click', function () {
            // При нажатии на кнопку вызова формы скрываем кнопку и блок с текстом
            $entityEditBtn.addClass('d-none');
            $entityTextBlock.addClass('d-none');

            // Отображаем форму, обновляем её высоту и ставим фокус в <textarea>
            $entityForm.removeClass('d-none');


            //textareaHeight($entityTextarea);
            //$entityTextarea.focus();
        });

        $entityEditCancel.on('click', function (e) {
            // При нажатии на кнопку отмены скрываем форму и возвращаем блок с текстом
            e.preventDefault();
            $summerTextBlock.html(entityTextBlockValue);

            $entityForm.addClass('d-none');
            $entityEditBtn.removeClass('d-none');
            $entityTextBlock.removeClass('d-none');
        });

        $entityEditSubmit.on('click', function (e) {
            e.preventDefault();

            // Собираем данные для ajax запроса
            var text = $entityTextarea.val();
            var link = `/${entityType}s/${entityId}/edit`;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                datatype: "json",
                url: link,
                data: {
                    type: entityType,
                    id: entityId,
                    text: text,
                    is_ajax: true,
                },

                beforeSend: function () {
                    $entityEditLoader.removeClass('d-none');
                },

                success: function (data) {
                    if (data.text) {
                        // Вносим новый текст в блок текста
                        $entityTextBlock.html(data.text);
                        $entityTextarea.val(data.text);
                        $summerTextBlock.html(data.text);
                        toastr.success('Successfully edited!');
                    } else {
                        //
                    }
                },

                complete: function () {
                    // Скрываем форму, отображаем блок текста и кнопку редактирования
                    $entityForm.addClass('d-none');
                    $entityTextBlock.removeClass('d-none');
                    $entityEditBtn.removeClass('d-none');
                    $entityEditLoader.addClass('d-none');
                }
            });
        });
    }

});
