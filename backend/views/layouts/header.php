<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <!-- <div class="col-sm-8">col-sm-8</div>
    <div class="col-sm-4">col-sm-4</div> -->
  <div class="container-fluid">
    <div class="col-sm-2">
      <a class="navbar-brand" href="#"> <img id="logo" src="<?= Yii::$app->request->baseUrl; ?>../../myassets/logo.png" width="120px" height="40px"></a>
    </div>

    <div class="col-sm-9">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

        <li class="nav-item">
          <a style="font-weight: bold;" class="nav-link fnthover" href="<?= Url::to(['/job/create']) ?>">Add Jobs</a>
        </li>
        <li style="font-weight: bold;" class="nav-item">
          <a class="nav-link fnthover" href="<?= Url::to(['/site/companyform']) ?>">Add Companies</a>
        </li>
      </ul>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">


        <li>
          <?php echo  Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
              'Logout (' . Yii::$app->user->identity->username . ')',
              ['class' => 'btn btn-link logout']
            )
            . Html::endForm();
          ?>

        </li>

      </ul>
    </div>
  </div>
</nav>