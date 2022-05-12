<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProfileController extends Controller
{
    /**
     * Displays index page.
     *
     * @return mixed
     */
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


    /**
     * Displays show page.
     *
     * @return mixed
     */
    public function actionShow($id)
    {
        /**
         * @var $user User;
         */
        $user = User::findOne(['id' => $id]);
        if ($user) {
            $profileInfo = $user->publicInfo;
            return $this->render('show', [
                'user' => $user,
                'profileInfo' => $profileInfo,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
