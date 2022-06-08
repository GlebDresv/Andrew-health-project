<?php
/* @var $this yii\web\View
 * @var News $news
 */

use common\models\News;
use yii\helpers\Html;
$this->title = $news->header;
?>
<div class="profile-show">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($news->image) {
        ?>
        <img src="<?= $news->image ?>" width="256px" height="256px" alt="">;
        <?php
    }
    ?>
    <br>
    <p>
        <?= $news->text; ?>
    </p>
</div>
