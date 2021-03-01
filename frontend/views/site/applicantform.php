<?php

use backend\models\Company;
use backend\models\Job;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Applicant */
/* @var $form ActiveForm */
$job = ArrayHelper::map(Job::find()->all(),'id','position');
$company = ArrayHelper::map(Company::find()->all(),'id','name');
?>
<div class="site-applicantform">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'job_id')->dropDownList($job) ?>
        <?= $form->field($model, 'company_id')->dropDownList($company) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-applicantform -->
