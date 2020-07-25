<?php
namespace Page\Acceptance;

use Codeception\Step\Argument\PasswordArgument;

class Login
{
    // include url of current page
    public static $URL = '/login';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public $emailField = 'email';
    public $passwordField = 'password';
    public $loginButton = 'Login';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    public function login($name, $password)
    {
        $I = $this->acceptanceTester;

        $I->amOnPage(self::$URL);
        $I->fillField($this->emailField, $name);
        $I->fillField($this->passwordField, new PasswordArgument($password));
        $I->click($this->loginButton);
    }

}
