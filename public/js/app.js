$(document).ready(function () {
    const loadBtn = $(".js-load-comments");

    if (loadBtn.length > 0) {
        // находим и прячем анимацию загрузки и сообщение о закончившихся комментах
        var loader = $("#loader");
        loader.hide();
        var noMoreComments = $(".no-more-comments");
        noMoreComments.hide();

        // получаем id статьи и id последнего отображаемого коммента
        const article = $(".article").attr("id").slice(8);
        var offset = $(".comments").children().last().attr("id").slice(8);

        // заряжаем кнопку загрузки полученными выше атрибутами
        loadBtn.attr('data-offset', offset);
        loadBtn.attr('data-article', article);

        // вешаем эвент на нажатие кнопки
        loadBtn.click(loadComments);

        function loadComments() {
            var view;
            var url = `/articles/${article}/${offset}`;

            const xhr = new XMLHttpRequest();

            xhr.open('GET', url, true);

            xhr.onloadstart = function () {
                loadBtn.hide();
                loader.show();
            };

            xhr.onloadend = function () {
                loader.hide();
                loadBtn.show();
            };

            xhr.onload = function () {
                if (this.status === 200) {
                    // получаем html
                    view = JSON.parse(this.response);

                    if (view.success == true) {
                        if (view.view) {
                            // прикрепляем полученный html к блоку комментов
                            $(".comments").append(view.view);

                            // обновляем id последнего отображаемого коммента и передаем его в кнопку
                            offset = $(".comments").children().last().attr("id").slice(8);
                            loadBtn.attr('data-offset', offset);
                        } else {
                            noMoreComments.fadeIn(300);
                            noMoreComments.fadeOut(4000);
                        }
                    }
                }
            }

            xhr.send();
        }
    }
});
