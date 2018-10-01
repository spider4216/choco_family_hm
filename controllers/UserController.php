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

class UserController extends Controller
{
    public function actionCreate()
    {
        $request = \Yii::$app->request;
        
        if (TownsModel::findOne($request->post('town_id')) === null) {
            throw new NotFoundHttpException('Town not found');
        }
        
        $transaction = \Yii::$app->db->beginTransaction();
        
        $user = new SubjectModel();
        
        $user->email = $request->post('email');
        $user->phone = $request->post('phone');
        
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
            'name' => $request->post('name'),
            'surname' => $request->post('surname'),
            'gender' => $request->post('gender'),
            'town_id' => $request->post('town_id'),
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
        
        return [
            'status' => RestStatusEnum::OK,
            'user_id' => $user->id,
        ];
    }
}

