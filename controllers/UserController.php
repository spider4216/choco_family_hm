<?php
namespace app\controllers;

use app\models\SubjectModel;
use app\models\UserDataModel;
use app\models\TownsModel;
use yii\web\NotFoundHttpException;
use app\exceptions\SubjectException;
use app\exceptions\UserDataException;
use app\enums\RestStatusEnum;
use yii\base\Controller;
use app\dto\CreateUserDto;

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
}

