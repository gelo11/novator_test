<?php

namespace app\controllers;

use yii\rest\ActiveController;

class BookApiController extends ActiveController
{
    public $modelClass = 'app\models\Book';
}