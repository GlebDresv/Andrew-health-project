<?php

use common\models\ProfileInfo;
use common\models\User;
use frontend\models\ProfileForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 *
 * @var yii\web\View $this
 * @var User $userInfo
 * @var ProfileInfo $profileInfo
 * @var ProfileForm $model
 */


$this->title = 'Profile';
?>
<div class="profile-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <img src="<?= $profileInfo->image ?>" width="220px" height="200px" border-radius="50%" alt="">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullName')->textInput(['value' => $profileInfo->full_name]) ?>

    <?= $form->field($model, 'phoneNumber')->textInput(['type' => 'number', 'value' => $profileInfo->phone_number]) ?>

    <?= $form->field($model, 'about')->textInput([ 'value' => $profileInfo->about]) ?>

    <?= $form->field($model, 'age')->textInput(['type' => 'number', 'value' => $profileInfo->age]) ?>

    <?= $form->field($model, 'height')->textInput(['type' => 'number', 'value' => $profileInfo->height]) ?>

    <?= $form->field($model, 'desiredDistance')->textInput(['type' => 'number', 'value' => $profileInfo->desired_distance]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
