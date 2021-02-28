<div class="shadow-sm p-3 mb-5 bg-body rounded">
    <span style="font-size: 40px;color:#689;">Salaries</span>
    <hr class="new2">
    <?php

use backend\models\Company;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

$salariesquery = Company::find();
        $providersalary = new ActiveDataProvider([
            'query' => $salariesquery,
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
        'dataProvider' => $providersalary,
        'itemView' => '_salaries',
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
        'pagination' => $providersalary->pagination,
    ]);
    ?>
</div>