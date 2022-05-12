<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var ArrayDataProvider $dataProvider
 */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        Some text
    </div>

    <div class="body-content">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'full_name',
                    'distance_day',
                    'distance_week',
                    'distance_all',
                    ]
        ])
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>
