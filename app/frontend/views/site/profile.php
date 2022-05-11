<?php

/**
 * @var frontend\controllers\SiteController $personal_info
 * @var frontend\controllers\SiteController $public_info
 * @var yii\web\View $this
 */

use yii\helpers\Html;

$this->title = 'Profile';
?>
<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>
    <img src="<?= $public_info->image ?>" width="220px" height="220px" border-radius="50%" alt="">
    <p><b><?= $personal_info->username . ' (' . $public_info->full_name . ')' ?></b>
        <br><?= $personal_info->email ?><br>
        <?= $public_info->phone_number ?></p>
    <p><?= $public_info->about ?></p>
    Distance:
    <ul>
        <li>Today: <?= $public_info->distance_day ?></li>
        <li>Week: <?= $public_info->distance_week ?></li>
        <li>All: <?= $public_info->distance_all ?></li>
    </ul>
    <p>desired: <?= $public_info->desired_distance ?> | recommended: <?= $public_info->recommended_distance ?></p>
</div>
