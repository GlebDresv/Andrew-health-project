<?php

use common\models\ProfileInfo;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 *
 * @var yii\web\View $this
 * @var User $userInfo
 * @var ProfileInfo $profileInfo
 */


$this->title = 'Profile';
?>
<div class="profile-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <img src="<?= $profileInfo->image ?>" width="220px" height="200px" border-radius="50%" alt="">
    <p><b><?= $userInfo->username . ' (' . $profileInfo->full_name . ')' ?></b>
        <br><?= $userInfo->email ?><br>
        <?= $profileInfo->phone_number ?></p>
    <p><?= $profileInfo->about ?></p>
    Distance:
    <ul>
        <li>Today: <?= $profileInfo->distance_day ?></li>
        <li>Week: <?= $profileInfo->distance_week ?></li>
        <li>All: <?= $profileInfo->distance_all ?></li>
    </ul>
    <p>desired: <?= $profileInfo->desired_distance ?> | recommended: <?= $profileInfo->recommended_distance ?></p>
</div>
