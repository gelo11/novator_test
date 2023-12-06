<?php

use Codeception\Util\HttpCode;

class BookApiCest
{
    public function getAllBooks(ApiTester $I)
    {
        $I->sendGet('book-apis');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseIsValidOnJsonSchemaString('{"type":"array"}');
        $validResponseJsonSchema = json_encode(
            [
                'properties' => [
                    'id' => ['type' => 'integer'],
                    'caption' => ['type' => 'string'],
                    'year' => ['type' => 'integer'],
                    'pages' => ['type' => 'integer']
                ]
            ]
        );
        $I->seeResponseIsValidOnJsonSchemaString($validResponseJsonSchema);
    }
}
