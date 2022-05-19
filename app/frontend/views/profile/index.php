<?php

use budyaga\cropper\Widget;
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
<head>
    <title>Crop Before Uploading Image using Cropper JS & PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="<?= Url::to('../cropperjs/cropper.min.css') ?>" rel="stylesheet" type="text/css"/>
</head>
<style type="text/css">
    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

</style>
<img src="<?= $profileInfo->image ?>" width="256px" height="256px" alt="">
<div class="profile-index">

    <div class="container">
        <h5>Upload Images</h5>
        <form method="post">
            <input type="file" name="image" class="image">
        </form>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <!--  default image where we will set the src via jquery-->
                                <img id="image">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src=<?= Url::to('../cropperjs/cropper.min.js') ?> type="text/javascript"></script>
<script>

    var bs_modal = $('#modal');
    var image = document.getElementById('image');
    var cropper, reader, file;


    $("body").on("change", ".image", function (e) {
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            bs_modal.modal('show');
        };


        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    bs_modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function () {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                // error here
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "<?= Url::to('/profile/upload.php') ?>",
                    data: {image: base64data},
                    success: function (data) {
                        bs_modal.modal('hide');
                        alert("success upload image");
                    }
                });
            };
        });
    });

</script>


<h1><?= Html::encode($this->title) ?></h1>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



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
