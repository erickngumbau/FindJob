<?php

namespace frontend\controllers;

use backend\models\Company;
use yii\data\ActiveDataProvider;

class CompanyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $companies = Company::find();

        $provider = new ActiveDataProvider([
            'query' => $companies,
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
