<?php

namespace Tests\Acceptance;

use Codeception\Step\Argument\PasswordArgument;
use Page\Acceptance\Login;


class LoginCest
{
    public function _before(\AcceptanceTester $I)
    {
    }

    public function loginSuccessfully(\AcceptanceTester $I, Login $login)
    {
        $login->login('vasilyev@ngrd.ru', 'qqqqqqqq');
        $I->see('You are logged in!');
    }

//    public function loginWithInvalidPassword(\AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->wait(10);
//
//        $I->see('Hello there!');
//    }
}
