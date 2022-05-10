<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Profile';
?>
<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= var_dump($user) ?>
    <?php exit;?>
    <img src="<?= $user_auth->image ?>">
</div>
