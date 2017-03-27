<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="stretched">
    <?php $this->beginBody() ?>

        <div class="vid-container">
            <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
                <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
            </video>
            <div class="inner-container">
                <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
                    <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
                </video>
                <div class="box">
                    <h1>Login</h1>
                    <input type="text" placeholder="Username"/>
                    <input type="text" placeholder="Password"/>
                    <button>Login</button>
                    <p>Not a member? <span>Sign Up</span></p>
                </div>
            </div>
        </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>