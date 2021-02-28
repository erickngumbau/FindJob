    <div class="container" style="margin-top: 5px;">
        <div class="row">
            <div class="col-sm-3 wrap p-2 shadow p-3 mb-5 bg-body rounded">
                <p><i class="fa fa-tachometer fa-3x" aria-hidden="true"></i>
                    <span style="color:#c55;font-size:30px;margin-left: 5px;">Total Jobs</span>
                </p>
                <p style="font-size:20px;margin-left: 70px;"><?=$jobcount?></p>
            </div>
            <div class="col-sm-3 wrap p-2 shadow p-3 mb-5 bg-body rounded">
                <p><i class="fa fa-tachometer fa-3x" aria-hidden="true"></i>
                    <span style="color:#c55;font-size:30px;margin-left: 5px;">Companies</span>
                </p>
                <p style="font-size:20px;margin-left: 70px;"><?=$companiescount?></p>
            </div>
            <div class="col-sm-3 wrap p-2 shadow p-3 mb-5 bg-body rounded">
                <p><i class="fa fa-tachometer fa-3x" aria-hidden="true"></i>
                    <span style="color:#c55;font-size:30px;margin-left: 5px;">Applicants</span>
                </p>
                <p style="font-size:20px;margin-left: 70px;"><?=$applicantscount?></p>
            </div>
        </div>
    </div>

<?php

use backend\models\Job;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$query = Job::find();
$dataProvider = new ActiveDataProvider([
     'query' => $query,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'defaultOrder' => [
            'created_at' => SORT_DESC,
        ]
    ],
]);
?>
<div>
    <p><span style="font-size: 40px;color:#689;">Jobs Created</span></p>
</div>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'summary'=>'', 
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'position',
        'description',
        'skills',
        'created_at'
        
    ],
]);
?>