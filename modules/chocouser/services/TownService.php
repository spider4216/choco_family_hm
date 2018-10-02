<?php
namespace app\modules\chocouser\services;

use yii\base\Component;
use app\modules\chocouser\models\TownsModel;

class TownService extends Component
{
    public function allTowns()
    {
        return TownsModel::find()->asArray()->all();
    }
}

