  <?php

use yii\helpers\Url;

?>
  <div class="card text-center card h-100 shadow p-3 mb-5 bg-body rounded">
    <div class="card-header" style="font-weight: 900;">
      <?= $model->position ?>
    </div>
    <div class="card-body">
      <!-- <h5 class="card-title"></h5> -->
      <p class="card-text"><?= $model->description ?></p>
    </div>
    <div class="card-footer text-muted">
      <a href="<?= Url::to(['/job/jobdetailed','id'=>$model->id])?>">View Job</a>

    </div>
  </div>