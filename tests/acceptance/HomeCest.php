<?php

use yii\helpers\Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));        
        $I->see('My Company');

        $I->see('Год:');

        $I->see('Страниц:');

        $I->seeLink('Вход');
        $I->click('Вход');
        $I->wait(2); // wait for page to be opened
        
        $I->see('Login');
    }
}
