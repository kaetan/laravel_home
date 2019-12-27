$(document).ready(function () {

    // Подгоняет высоту <textarea> под содержимое, пока что и здесь, и в отдельном методе. Сложно.
    const $entityCheck = $(".entity");
    if ($entityCheck.length) {
        $('textarea').each(function () {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }

    // Находим всю информацию о сущности
    const entity = $(".entity");
    const entityId = entity.data('entity-id');
    const entityType = entity.data('entity-type');

    // Блок с текстом сущности
    var $entityTextBlock = $('.js-entity-text');
    // Форма для редактирования текста сущности
    var $entityForm = $('.js-entity-edit');
    // <textarea> из формы
    var $entityTextarea = $entityForm.find('textarea');
    // Кнопка вызова формы
    var $entityEditBtn = $('.js-entity-edit-btn');
    // Кнопка отправки формы
    var $entityEditSubmit = $('.js-entity-edit-submit');

    if ($entityEditBtn.length) {
        $entityEditBtn.on('click', function () {
            // При нажатии на кнопку вызова формы скрываем кнопку и блок с текстом
            $entityEditBtn.addClass('d-none');
            $entityTextBlock.addClass('d-none');

            // Отображаем форму, обновляем её высоту и ставим фокус в <textarea>
            $entityForm.removeClass('d-none');
            textareaHeight($entityTextarea);
            $entityTextarea.focus();
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
                    //
                },

                success: function (data) {
                    if (data.text) {
                        // Вносим новый текст в блок текста
                        $entityTextBlock.find('p').html(data.text);
                        $entityTextarea.val(data.text);
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
                }
            });
        });
    }


    function textareaHeight($textarea) {
        $textarea.each(function () {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
});
