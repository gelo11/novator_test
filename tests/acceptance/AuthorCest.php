<?php

use yii\helpers\Url;

class AuthorCest
{
    public function ensureThatAuthorPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/author/index'));
        $I->wait(2); // wait for page to be opened
        $I->dontSee('Authors', 'h1');

        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'admin');
        $I->fillField('input[name="LoginForm[password]"]', 'admin');
        $I->click('login-button');
        $I->wait(2); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->see('Logout');

        $I->seeLink('Авторы');
        $I->click('Авторы');
        $I->wait(2);

        $I->see('Authors', 'h1');
    }
}
