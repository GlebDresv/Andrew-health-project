<?php

use common\models\PublicInfo;
use common\models\User;
use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var User $personalInfo
 * @var PublicInfo $publicInfo
 */


$this->title = 'Show';
?>
<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>
    <img src="<?= $publicInfo->image ?>" width="220px" height="200px" border-radius="50%" alt="">
    <p><b><?= $personalInfo->username . ' (' . $publicInfo->full_name . ')' ?></b>
        <br><?= $personalInfo->email ?><br>
        <?= $publicInfo->phone_number ?></p>
    <p><?= $publicInfo->about ?></p>
    Distance:
    <ul>
        <li>Today: <?= $publicInfo->distance_day ?></li>
        <li>Week: <?= $publicInfo->distance_week ?></li>
        <li>All: <?= $publicInfo->distance_all ?></li>
    </ul>
    <p>desired: <?= $publicInfo->desired_distance ?> | recommended: <?= $publicInfo->recommended_distance ?></p>
</div>
