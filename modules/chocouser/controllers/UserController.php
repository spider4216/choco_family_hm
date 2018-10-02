<?php
namespace app\modules\chocouser\controllers;

use yii\web\NotFoundHttpException;
use yii\base\Controller;
use app\modules\chocouser\dto\CreateUserDto;
use app\modules\chocouser\models\SubjectModel;
use app\modules\chocouser\models\TownsModel;
use app\modules\chocouser\enums\RestStatusEnum;

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
        
        $user = \Yii::$app->getModule('chocouser')->subject->create($dto);
        
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
        
        return \Yii::$app->getModule('chocouser')->subject->detailById($id);
    }
    
    public function actionUserCount()
    {
        $count = \Yii::$app->getModule('chocouser')->subject->usersCount();
        
        return [
            'count' => $count,
        ];
    }
}

