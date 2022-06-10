<?php

namespace frontend\controllers;

use common\models\Location;
use Faker\Provider\DateTime;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class LocationController extends Controller
{
    public function actionAdd()
    {
        $request = Yii::$app->request->getBodyParams();
        $location = new Location();

        if (Yii::$app->request->post() && $location->validate()) {
            $location->user_id = $request['user_id'];
            $location->longitude = $request['longitude'];
            $location->latitude = $request['latitude'];
            $location->time = date('y-m-j,h-i-s');
            $location->save();
        }
    }

    public function actionIndex()
    {
        $user = yii::$app->user->identity;
        $location = Location::find()->where('user_id' == yii::$app->user->id)->orderBy(['time' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $location,
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'user' => $user,
            'location' => $location,
        ]);
    }

    public function beforeAction($action)
    {
        if ($action->id == 'add') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}
