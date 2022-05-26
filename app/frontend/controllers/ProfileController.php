<?php

namespace frontend\controllers;

use budyaga\cropper\Widget;
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


        if(Yii::$app->request->isPost){
            if ($profileInfo->load(Yii::$app->request->post())) {
                var_dump($_FILES);
                exit;
                $profileInfo->file = UploadedFile::getInstance($profileInfo, 'file');

                if ($profileInfo->validate()) {

                    $profileInfo->file->saveAs(Yii::getAlias("@webroot") . '/img/' . $user->username . '_avatar.png' );
                    $profileInfo->image = Yii::$app->request->baseUrl . '/img/' . $user->username . '_avatar.png';
                    $profileInfo->save();
                    $view = 'show';
                }
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
