<?php


namespace Tests\Acceptance;


use Codeception\Util\Locator;
use Page\Acceptance\Login;

class CheckArticleCest
{
    public function checkArticle(\AcceptanceTester $I, Login $login)
    {
        $articleName = 'CINNAMON ROLL APPLE ROSE TART';
        $stringToSee = 'APPLES FOR AN APPLE ROSE TART';

        // Логинимся
        $login->login('vasilyev@ngrd.ru', 'qqqqqqqq');
        $I->see('You are logged in!');

        // Переходим на страницу вопросов
        $I->amOnPage('/articles');
        $I->see($articleName);
        $I->click($articleName);

        // Оставляем комментарий
        $I->see($stringToSee);
    }
}
