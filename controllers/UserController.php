<?php
namespace app\controllers;

use app\models\TownsModel;
use yii\web\NotFoundHttpException;
use app\enums\RestStatusEnum;
use yii\base\Controller;
use app\dto\CreateUserDto;
use app\models\SubjectModel;

class UserController extends Controller
{
    public function actionCreate()
    {
        $request = \Yii::$app->request;
        
        if (TownsModel::findOne($request->post('town_id')) === null) {
            throw new NotFoundHttpException('Town not found');
        }
        
        $dto = new CreateUserDto();
        
        $dto->setEmail($request->post('email'))
        ->setPhone($request->post('phone'))
        ->setName($request->post('name'))
        ->setSurname($request->post('surname'))
        ->setGender($request->post('gender'))
        ->setTownId($request->post('town_id'));
        
        $user = \Yii::$app->subject->create($dto);
        
        return [
            'status' => RestStatusEnum::OK,
            'user_id' => $user->id,
        ];
    }
    
    public function actionUserList()
    {
        return SubjectModel::find()->select([
            'id',
            'phone'
        ])->asArray()->all();
    }
    
    public function actionUserDetail()
    {
        $id = \Yii::$app->request->get('id');
        
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

