<?php

namespace frontend\controllers;

use backend\models\Company;
use yii\data\ActiveDataProvider;

class SalaryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $company = Company::find();

        $provider = new ActiveDataProvider([
            'query' => $company,
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index',['provider'=>$provider]);
    }

}
