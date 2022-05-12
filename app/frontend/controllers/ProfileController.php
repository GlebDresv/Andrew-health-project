<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\ProfileForm;
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
         * @var $userInfo User;
         */
        $userInfo = yii::$app->user->identity;
        $profileInfo = $userInfo->publicInfo;
        return $this->render('show', [
            'userInfo' => $userInfo,
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
        $res = User::findOne(['id' => $id]);
        if ($res != null) {
            /**
             * @var $userInfo User;
             */
            $userInfo = User::findOne(['id' => $id]);
            $profileInfo = $userInfo->publicInfo;
            return $this->render('show', [
                'userInfo' => $userInfo,
                'profileInfo' => $profileInfo,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
