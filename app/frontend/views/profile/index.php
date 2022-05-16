<?php

use bilginnet\cropper\Cropper;
use common\models\ProfileInfo;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
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





    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <img src="<?= $profileInfo->image ?>" width="256px" height="256px" alt="">
    <?= $form->field($profileInfo, 'file')->fileInput() ?>

    <?= $form->field($profileInfo, 'full_name')->textInput(['value' => $profileInfo->full_name]) ?>

    <?= $form->field($profileInfo, 'phone_number')->textInput(['type' => 'number', 'value' => $profileInfo->phone_number]) ?>

    <?= $form->field($profileInfo, 'about')->textInput(['value' => $profileInfo->about]) ?>

    <?= $form->field($profileInfo, 'age')->textInput(['type' => 'number', 'value' => $profileInfo->age]) ?>

    <?= $form->field($profileInfo, 'height')->textInput(['type' => 'number', 'value' => $profileInfo->height]) ?>

    <?= $form->field($profileInfo, 'desired_distance')->textInput(['type' => 'number', 'value' => $profileInfo->desired_distance]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
