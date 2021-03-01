<?php

namespace frontend\controllers;

use backend\models\Company;
use backend\models\Job;
use yii\data\ActiveDataProvider;

class JobController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $job = Job::find();

        $provider = new ActiveDataProvider([
            'query' => $job,
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);
        
        return $this->render('index',['provider'=>$provider]);
    }

    public function actionJobdetailed($id)
    {
        $job = Job::find()
            ->where(['id' => $id])
            ->one();

        $model = Company::find()
            ->where(['job_id' => $id])
            ->all();

        return $this->render('jobdetailed',['model'=>$model,'job'=>$job]);
    }

}
