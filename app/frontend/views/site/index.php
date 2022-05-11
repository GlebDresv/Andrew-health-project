<?php

use common\models\PublicInfo;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var $dataProvider PublicInfo
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
                'full_name',
                'distance_day',
                'distance_week',
                'distance_all',
            ]

        ])
        ?>
    </div>
</div>
