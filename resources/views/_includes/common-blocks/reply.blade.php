<div id="reply" class="reply <?= !empty($replyClass) ? $replyClass : ''; ?>">
    <div class="reply__wrapper">
        <h3 class="reply__header">Оставить отзыв</h3>
        <p class="reply__note">Ваш email не будет опубликован. Обязательные поля отмечены *</p>
        <form action="#" class="reply__form">
            <label for="comment" class="reply__label">Комментарий</label>
            <textarea name="comment" id="comment" cols="30" rows="7" class="reply__input"></textarea>

            <label for="user-name" class="reply__label">Ваше имя *</label>
            <input id="user-name" name="user-name" type="text" class="reply__input">

            <label for="user-email" class="reply__label">Ваш email *</label>
            <input id="user-email" name="user-email" type="email" class="reply__input">

            <div class="reply__checkbox-wrapper">
                <input id="user-newsletter" name="user-newsletter" type="checkbox" class="reply__checkbox">
                <label for="user-newsletter" class="reply__checkbox-label">Подписаться на нашу почтовую рассылку</label>
            </div>

            <button type="submit" class="reply__btn">Отправить комментарий</button>
        </form>
    </div>
</div>
