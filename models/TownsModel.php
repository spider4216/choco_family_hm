<?php
namespace app\models;

use yii\db\ActiveRecord;

class TownsModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'towns';
    }
}

