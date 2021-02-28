<?php

namespace frontend\controllers;

class JobController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
