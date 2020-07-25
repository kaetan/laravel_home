<?php


namespace Tests\Acceptance;


use Codeception\Util\Locator;
use Page\Acceptance\Login;

class PostCommentCest
{
    public function postComment(\AcceptanceTester $I, Login $login)
    {
        $testComment = 'Hello, this is my acceptance test comment №' . rand();

        // Логинимся
        $login->login('vasilyev@ngrd.ru', 'qqqqqqqq');
        $I->see('You are logged in!');

        // Переходим на страницу вопросов
        $I->amOnPage('/questions');
        $I->seeElement('a', ['class' => 'h4']);
        $I->click(Locator::firstElement('a.h4'));

        // Оставляем комментарий
        $I->see('Submit your comment!');
        $I->wait(2);
        $I->fillField("#comment-textarea", $testComment);
        $I->click("#comment-submit");

        // Проверяем наличие комментария
        $I->wait(3);
        $I->see($testComment);

    }
}
