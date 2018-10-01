<?php
namespace app\services;

use yii\base\Component;
use app\dto\CreateUserDto;
use app\models\SubjectModel;
use app\exceptions\SubjectException;
use app\models\UserDataModel;
use app\exceptions\UserDataException;

class UserService extends Component
{
    public function create(CreateUserDto $dto) : SubjectModel
    {
        $transaction = \Yii::$app->db->beginTransaction();
        
        $user = new SubjectModel();
        
        $user->attributes = [
            'email' => $dto->getEmail(),
            'phone' => $dto->getPhone(),
        ];
        
        if ($user->save() === false) {
            $transaction->rollBack();
            
            throw new SubjectException(
                \Yii::t(
                    'app',
                    'cannot create user: {err}', [
                        'err' => implode(';', $user->getErrorSummary(true))
                    ]
                )
            );
        }
        
        $profile = new UserDataModel();
        
        $profile->attributes = [
            'user_id' => $user->id,
            'name' => $dto->getName(),
            'surname' => $dto->getSurname(),
            'gender' => $dto->getGender(),
            'town_id' => $dto->getTownId(),
        ];
        
        if ($profile->save() === false) {
            $transaction->rollBack();
            
            throw new UserDataException(
                \Yii::t(
                    'app',
                    'cannot create user profile: {err}', [
                        'err' => implode(';', $profile->getErrorSummary(true))
                    ]
                )
            );
        }
        
        $transaction->commit();
        
        return $user;
    }
    
    public function detailById(int $id) : array
    {
        return SubjectModel::find()
        ->select(
            'users.*, ud.name as first_name, ud.surname, ud.gender, ' .
            't.name as city_name, t.translit_name as city_translit_name'
        )
        ->leftJoin('user_data ud', 'ud.user_id=users.id')
        ->leftJoin('towns t', 'ud.town_id=t.id')
        ->where(['users.id' => $id])
        ->asArray()
        ->one();
    }
}

