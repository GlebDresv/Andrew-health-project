<?php

use common\models\ProfileInfo;
use common\models\User;
use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var User $user
 * @var ProfileInfo $profileInfo
 */


$this->title = 'Show_Profile';
?>
<div class="profile-show">
    <h1><?= Html::encode($this->title) ?></h1>
    <img src="<?= $profileInfo->image ?>" width="256px" height="256px" alt="">
    <p>
        <b>
            <?php
            if ($profileInfo->full_name) {
                $full_name = $user->username . ' (' . $profileInfo->full_name . ')';
            } else {
                $full_name = $user->username;
            }
            echo $full_name ?>
        </b><br>
        <?= $user->email ?><br>
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
