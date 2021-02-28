<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form container wrapper">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'skills')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
