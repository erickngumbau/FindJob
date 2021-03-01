<?php

use backend\models\Job;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Company */
/* @var $form ActiveForm */
$job = ArrayHelper::map(Job::find()->all(),'id','position');
$user = ArrayHelper::map(User::find()->all(),'id','username');
?>
<div class="site-companyform">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'job_id')->dropDownList($job) ?>
        <?= $form->field($model, 'user_id')->dropDownList($user) ?>
        <?= $form->field($model, 'salary') ?>
        <?= $form->field($model, 'employees_required') ?>
        <?= $form->field($model, 'country') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'image')->fileInput() ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-companyform -->
