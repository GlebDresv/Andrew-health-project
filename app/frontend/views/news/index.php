<?php
/* @var $this yii\web\View
 * @var ActiveDataProvider $dataProvider
 */

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>news/index</h1>

<div class="site-index">
    <div class="body-content">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'Header',
                    'value' => function ($news) {
                        return Html::a(Html::encode($news->header), Url::to(['news/' . $news->id]));
                    },
                    'format' => 'raw',
                ],
                'updated_at',
            ]
        ])
        ?>
    </div>
</div>
