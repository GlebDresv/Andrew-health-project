<?php

namespace frontend\controllers;

use common\models\PublicInfo;
use common\models\User;
use Yii;

class ProfileController extends \yii\web\Controller
{
    /**
     * Displays index page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        /**
         * @var $personal_info User;
         *
         */
        $personal_info = Yii::$app->user->identity;
        $public_info = $personal_info->publicInfo;
        return $this->render('index', [
            'personal_info' => $personal_info,
            'public_info' => $public_info,
        ]);
    }
}
