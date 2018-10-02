<?php
namespace app\services;

use yii\base\Component;
use app\models\TownsModel;

class TownService extends Component
{
    public function allTowns()
    {
        return TownsModel::find()->asArray()->all();
    }
}

