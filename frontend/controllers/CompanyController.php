<?php

namespace frontend\controllers;

use backend\models\Company;

class CompanyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $companies = Company::find()->all();
        return $this->render('index',['companies'=>$companies]);
    }

}
