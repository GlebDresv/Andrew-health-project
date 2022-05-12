<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProfileController extends Controller
{

    public function actionIndex()
    {
        /**
         * @var $user User;
         */
        $user = yii::$app->user->identity;
        $profileInfo = $user->publicInfo;
        return $this->render('index', [
            'user' => $user,
            'profileInfo' => $profileInfo,
        ]);
    }

    public function actionShow($id)
    {
        /**
         * @var $user User;
         */
        $user = User::findOne(['id' => $id]);
        if (!$user) {
            throw new NotFoundHttpException();
        }

        $profileInfo = $user->profileInfo;
        if (!$profileInfo) {
            throw new NotFoundHttpException();
        }

        return $this->render('show', [
            'user' => $user,
            'profileInfo' => $profileInfo,
        ]);
    }
}
