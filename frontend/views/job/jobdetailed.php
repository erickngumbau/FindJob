<?php

use yii\bootstrap4\Modal;
use yii\helpers\Url;

?>
<div style="margin-left: 70px; font-size: 40px;color:#689;">Job Details</div>
<hr class="new2">

<?php foreach ($model as $model) { ?>
  <div class="card border-info mb-3" style="max-width: 65rem;">
    <div class="card-header" style="font-weight: 900; text-align: center;"><?= $job->position ?></div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4">
          <p><img src="<?=Url::to('@web/myassets/realimages/'.$model->image)?>" alt="" /></p>
          <p>Ksh. <?= $model->salary ?> per month</p>
          <p class="card-text">Company : <?= $model->name ?></p>
          <p><?= $model->country ?>, <?= $model->city ?></p>

        </div>

        <div class="col-sm-8">
          <p class="card-text">Description : <br><?= $job->description ?>.</p>
          <p class="card-text">Skills : <br><?= $job->skills ?>.</p>
          <p>Date posted: <br><?= $job->created_at ?></p>
        </div>
      </div>
      <div class="row" style="display: flex;justify-content: center; align-items: center;margin-top:10px;">
      <button type="button" class="btn btn-outline-primary applicantform">Apply this Job</button>
      </div>
    </div>
  </div>
<?php } ?>


<?php
Modal::begin([
            'title'=>'<h4>Apply Job</h4>',
            'id'=>'applicantform',
            'size'=>'modal-lg'
            ]);
        echo "<div id='applicantformContent'></div>";
        Modal::end();
?>