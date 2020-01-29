<div class="subscribe ">
    <form action="#" class="subscribe__form <?= !empty($subscribeClass) ? $subscribeClass : ''; ?>">
        <label for="user-email" class="subscribe__header">Подписка на новые посты</label>
        <input id="user-email" name="user-email" type="email" class="subscribe__input" placeholder="email адрес">
        <button type="submit" class="subscribe__btn">Подписаться <i class="fas fa-arrow-right"></i></button>
    </form>
</div>
