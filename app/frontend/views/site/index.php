<?php

use common\models\ProfileInfo;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var ActiveDataProvider $dataProvider
 */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        Some text
    </div>

    <div class="body-content">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'full_name',
                    'value' => function ($profileInfo) {
                        return Html::a(Html::encode($profileInfo->full_name), Url::to(['profile/'.$profileInfo->userid]));
                    },
                    'format' => 'raw',
                ],
                'distance_day',
                'distance_week',
                'distance_all',
            ]
        ])
        ?>
    </div>
</div>
