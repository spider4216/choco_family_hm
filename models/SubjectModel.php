<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\enums\UserStatusEnum;

class SubjectModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
    
    public function rules()
    {
        return [
            [['email', 'phone',], 'required'],
            
            ['email', 'email'],
            
            [['email', 'phone'], 'string', 'max' => 255],
            
            ['status', 'default', 'value' => UserStatusEnum::ACTIVE],
            
            ['status', 'integer'],
        ];
    }
}

