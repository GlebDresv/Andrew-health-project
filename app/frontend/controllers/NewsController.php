<?php

namespace frontend\controllers;

use common\models\News;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $news = News::find()->orderBy(['updated_at'=>SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $news,
            'sort' => [
                'attributes' => ['updated_at'],
            ],
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'news' => $news,
        ]);
    }

    public function actionShow(int $id){
        $news = News::findOne(['id' => $id]);
        if (!$news) {
            throw new NotFoundHttpException();
        }
        return $this->render('show', [
            'news' => $news,
        ]);
    }
}
