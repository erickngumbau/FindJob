<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap h-100 d-flex flex-column">

        <?= $this->render('header') ?>

        <main class="d-flex">
        <?= $this->render('sidebar') ?>

        <div class="container hfle">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        </main>

    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>