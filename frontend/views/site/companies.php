<?php

use yii\helpers\Url;
?>
<div class="shadow-sm p-3 mb-5 bg-body rounded">
    <a href="<?= Url::to(['/company'])?>"  style="text-decoration:none;margin-left: 70px; font-size: 40px;color:#689;">Companies</a>

    <hr class="new2">
    <?php

use backend\models\Company;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;
use yii\widgets\ListView;


$providercompaniesquery = Company::find();
        $providercompanies = new ActiveDataProvider([
            'query' => $providercompaniesquery,
            'pagination' => [
                'pageSize' =>4,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

echo ListView::widget([
        'dataProvider' => $providercompanies,
        'itemView' => '_companies',
        'summary' => false,
        // options for wrapper
        'options' => [
            'tag' => 'div',
            'class' => 'row',
        ],
        // options for each item
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-sm-3 col-md-3 col-lg-3 ',
        ],
        'layout' => "{summary}\n{items}",

    ]);
    ?>

    <br>
    <?php

    echo LinkPager::widget([
        'pagination' => $providercompanies->pagination,
    ]);
    ?>
</div>