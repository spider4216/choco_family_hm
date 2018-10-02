<?php
namespace app\controllers;

use yii\base\Controller;

class TownsController extends Controller
{
    public function actionAll()
    {
        return \Yii::$app->town->allTowns();
    }
}

