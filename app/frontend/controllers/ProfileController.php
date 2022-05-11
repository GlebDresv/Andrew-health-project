<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\web\Controller;

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
         * @var $personalInfo User;
         */
        $personalInfo = Yii::$app->user->identity;
        $publicInfo = $personalInfo->publicInfo;
        return $this->render('index', [
            'personalInfo' => $personalInfo,
            'publicInfo' => $publicInfo,
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
         * @var $personalInfo User;
         */
        $personalInfo = User::findOne(['id'=>$id]);
        $publicInfo = $personalInfo->publicInfo;
        return $this->render('index', [
            'personalInfo' => $personalInfo,
            'publicInfo' => $publicInfo,
        ]);
    }
}
