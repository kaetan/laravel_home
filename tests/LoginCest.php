<?php
class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
//        $I->amOnPage('/');
    }

    public function loginSuccessfully(AcceptanceTester $I)
    {
        $I->amOnPage('/');
//        $I->wait(10);

        $I->see('Hello there!');
    }

    public function loginWithInvalidPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait(10);

        $I->see('Hello there!');
    }
}
