<?php

namespace frontend\controllers;

use common\models\ProfileInfo;
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
         * @var $pofileInfo ProfileInfo;
         */
        $user = yii::$app->user->identity;
        $profileInfo = $user->profileInfo;

        if (!$profileInfo) {
            $sql = "INSERT INTO profile_info(userid) VALUES ($user->id)";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if ($profileInfo->load(Yii::$app->request->post()) && $profileInfo->validate()) {
            $sql = 'UPDATE profile_info SET phone_number='.$profileInfo->phone_number.',full_name=\''.$profileInfo->full_name.'\',about=\''.$profileInfo->about.'\',height='.$profileInfo->height.',age='.$profileInfo->age.',desired_distance='.$profileInfo->desired_distance.' WHERE userid = '.$user->id.'';
            Yii::$app->db->createCommand($sql)->execute();
            return $this->render('show', [
                'user' => $user,
                'profileInfo' => $profileInfo,
            ]);
        } else {
            return $this->render('index', [
                'user' => $user,
                'profileInfo' => $profileInfo,
            ]);
        }
    }

    public function actionShow(int $id)
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
