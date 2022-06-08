<?php
/**
 * @var View $this
 * @var string $directoryAsset
 */
use yii\helpers\Url;
use yii\web\View;

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Main</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image img-circle elevation-2"
                     alt="User Image">
                <span class="d-none d-md-inline"><?= \Yii::$app->user->identity->username ?></span>
            </a>

        <li class="nav-item dropdown user-menu">
            <a class="btn" href="<?= Url::to('/site/logout')?>" data-method="post">Sign out</a>
    </ul>
</nav>
