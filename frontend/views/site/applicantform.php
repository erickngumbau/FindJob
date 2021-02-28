<?php

use backend\models\Job;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Applicant */
/* @var $form ActiveForm */
$job = ArrayHelper::map(Job::find()->all(),'id','position');
$user = ArrayHelper::map(User::find()->all(),'id','username');
?>
<div class="site-applicantform">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id')->dropDownList($user)?>
        <?= $form->field($model, 'job_id')->dropDownList($job) ?>
        <?= $form->field($model, 'company_id') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-applicantform -->
