<div style="margin-bottom: 10px;">
<div class="shadow p-3 mb-5 bg-body rounded">
<div style="font-weight: 900;" >

 KSh.<?= $model->salary ?> per month</div>

<br>
<?php

use backend\models\Job;

$job = Job::find()
    ->where(['id' => $model->job_id])
    ->one();
?>
Position: <?= $job->position?>
<br><br>

Company:  <?= $model->name?>
</div>
</div>