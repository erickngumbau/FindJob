<?php

use yii\widgets\ListView;

?>
<div style="margin-left: 70px; font-size: 40px;color:#689;">Companies Hiring Now</div>
<hr class="new2">
<?php
echo ListView::widget([
    'dataProvider' => $provider,
    'itemView' => '/site/_companies',
    'layout'=>'<div class="d-flex flex-wrap">{items}</div>', 

    // options for each item
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'col-sm-3 col-md-3 col-lg-3',
    ],

    // options for wrapper
    'options' => [
        'tag' => 'div',
        'class' => 'row',
    ],

]);
?>