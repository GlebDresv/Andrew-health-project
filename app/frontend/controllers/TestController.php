<?php

namespace frontend\controllers;

use app\models\People;
use yii\data\ActiveDataProvider;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = People::find();

        $peoples = $query->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,

        ]);
    }
}