<?php
/**
 * @var yii\web\View $this
 * @var ActiveDataProvider $dataProvider
 */

use yii\data\ActiveDataProvider;
use yii\grid\GridView;

?>
<h1>location/index</h1>

<div class="body-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'time',
            'longitude',
            'latitude',
        ]
    ])
    ?>
</div>