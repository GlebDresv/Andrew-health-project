<?php

namespace frontend\controllers;

use common\models\ProfileInfo;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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
        $view = 'index';

        if (!$profileInfo) {
            $profileInfo = new ProfileInfo;
        }

        if ($profileInfo->load(Yii::$app->request->post())) {
            $profileInfo->file = UploadedFile::getInstance($profileInfo, 'file');

            if ($profileInfo->validate()) {
                $profileInfo->userid = $user->id;
                $profileInfo->file->saveAs(Yii::getAlias("@webroot") . '/img/' . $profileInfo->userid . '_avatar' . '.' . $profileInfo->file->extension);
                $profileInfo->image = Yii::$app->request->baseUrl . '/img/' . $profileInfo->userid . '_avatar' . '.' . $profileInfo->file->extension;
                $profileInfo->save();
                $view = 'show';
            }
        }

        return $this->render($view, [
            'user' => $user,
            'profileInfo' => $profileInfo,
        ]);

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
