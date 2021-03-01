<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

?>
<div class="shadow-sm p-3 mb-5 bg-body rounded">

    <a href="<?= Url::to(['/job'])?>"  style="text-decoration:none;margin-left: 70px; font-size: 40px;color:#689;">JOBS</a>
    <hr class="new2">
    <?php
    echo ListView::widget([
        'dataProvider' => $provider,
        'itemView' => '_job',
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
        'pagination' => $provider->pagination,
    ]);
    ?>
</div>

<br>

<?= $this->render('salaries') ?>

<br>

<?= $this->render('companies') ?>