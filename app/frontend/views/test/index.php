<?php
use yii\web\View;
use app\models\People;
use yii\grid\GridView;
/**
 * @var $this View
 * @var $dataProvider People[]
 */
?>
<h1>Clients</h1>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
            'name',
            'city',
            'id',
    ]

])
?>


