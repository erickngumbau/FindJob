<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded">

  <!-- <div class="col-sm-8">col-sm-8</div>
    <div class="col-sm-4">col-sm-4</div> -->
  <div class="container-fluid">
    <div class="col-sm-2">
      <a class="navbar-brand" href="<?= Url::to(['/site/index']) ?>"> <img id="logo" src="<?= Yii::$app->request->baseUrl; ?>/myassets/logo.png" width="120px" height="40px"></a>
    </div>

    <div class="col-sm-8">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

        <li class="nav-item">
          <a class="nav-link" href="#">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Companies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Salaries</a>
        </li>
      </ul>
    </div>


    <div class="col-sm-2 collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">


        <?php if (Yii::$app->user->isGuest) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= Url::to(['/site/signup']) ?>">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= Url::to(['/site/login']) ?>">Login</a>
          </li>
        <?php } ?>

        <?php if (!(Yii::$app->user->isGuest)) { ?>
          <li class="nav-item">
            <?php echo  Html::beginForm(['/site/logout'], 'post')
              . Html::submitButton(
                'Logout(' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
              )
              . Html::endForm();
            ?>
          </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</nav>