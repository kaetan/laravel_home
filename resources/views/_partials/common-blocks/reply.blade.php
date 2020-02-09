<div id="reply" class="reply <?= !empty($replyClass) ? $replyClass : ''; ?>">
    <div class="reply__wrapper">
        <h3 class="reply__header">Оставить отзыв</h3>
        <p class="reply__note">Ваш email не будет опубликован. Обязательные поля отмечены *</p>
        <form class="reply__form js-comment-form" action="{{ route('comment.post') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $entityType }}" name="entity_type">
            <input type="hidden" value="{{ $entityId }}" name="entity_id">

            <label for="text" class="reply__label">Комментарий</label>
            <textarea name="text" id="text" cols="30" rows="7" class="reply__input"></textarea>

            <label for="user-name" class="reply__label">Ваше имя *</label>
            <input id="user-name" name="user-name" type="text" class="reply__input">

            <label for="user-email" class="reply__label">Ваш email *</label>
            <input id="user-email" name="user-email" type="email" class="reply__input">

            <div class="reply__checkbox-wrapper">
                <input id="user-newsletter" name="user-newsletter" type="checkbox" class="reply__checkbox">
                <label for="user-newsletter" class="reply__checkbox-label">Подписаться на нашу почтовую рассылку</label>
            </div>

            <button type="submit" class="reply__btn js-comment-submit-btn">Отправить комментарий</button>

            <div class="reply__loader none js-loader-submit">
                <div class="lds-ellipsis comments__load-animation ">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </form>
    </div>
</div>
