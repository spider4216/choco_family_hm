<?php
namespace app\modules\chocouser\controllers;

use yii\base\Controller;

class TownsController extends Controller
{
    public function actionAll()
    {
        return \Yii::$app->getModule('chocouser')->town->allTowns();
    }
}

