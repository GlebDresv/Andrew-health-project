<?php

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
<h1><?= Html::encode($this->title) ?></h1>
<head>
    <title>Crop Before Uploading Image using Cropper JS & PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="<?= Url::to('../cropperJs/cropper.css') ?>" rel="stylesheet" type="text/css"/>
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

<div class="profile-index">
    <img src="<?= $profileInfo->image ?>" width="256px" height="256px" alt="">

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
                                <img id="image" alt="">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='<?= Url::to('../cropperJs/cropper.js') ?>' type="text/javascript"></script>
    <script>

        function dataURItoBlob(dataURI) {

            let byteString = atob(dataURI.split(',')[1]);
            let mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

            let ab = new ArrayBuffer(byteString.length);
            let ia = new Uint8Array(ab);

            for (let i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], {type: mimeString});
        }

        let bs_modal = $('#modal');
        let image = document.getElementById('image');
        let cropper, reader, file, newImage;


        $("body").on("change", ".image", function (e) {
            let files = e.target.files;
            let done = function (url) {
                image.src = url;
                bs_modal.modal('show');
            };


            if (files && files.length > 0) {
                file = files[0];
                //URL == document.URL
                done(URL.createObjectURL(file));
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
            let canvas = cropper.getCroppedCanvas({
                width: 128,
                height: 128,
            });

            canvas.toBlob(function (blob) {
                let reader = new FileReader();
                reader.onload = function () {
                    newImage = reader.result;
                    bs_modal.modal('hide');
                };
                reader.readAsDataURL(blob);
            });
        })


    </script>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($profileInfo, 'file')->fileInput(['class' => 'image', 'accept' => 'image/*']) ?>

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

    <script>
        window.addEventListener("load", function () {
            $('#w0').on('beforeSubmit', function (event) {
                console.log('submit event')
                event.preventDefault();
                event.stopImmediatePropagation();
                sendData();
                return false;
            });

            function sendData() {
                image = dataURItoBlob(newImage);

                const XHR = new XMLHttpRequest();

                const formData = new FormData(document.querySelector('form#w0'));
                formData.set('ProfileInfo[file]', image);
                XHR.open('post', '<?= Url::to('/profile/index') ?>');
                XHR.onload = function () {
                    console.log(XHR.responseText);
                }
                XHR.send(formData);
                window.location.href = '<?= Url::to('/profile/index') ?>';
            }


        });
    </script>
</div>
