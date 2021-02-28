<?php

use yii\bootstrap4\Nav;
?>
<aside class="p-3 mb-5 bg-body rounded navclr">
<?php
echo Nav::widget([
    'options' => [
        'class' =>'d-flex flex-column nav-pills'], // set this to nav-tab to get tab-styled navigation

    'items' => [
        [
            'label' => 'Dashboard',
            'url' => ['site/index'],
            'icon'=>'home',

        ],
        [
            'label' => 'Add Job',
            'url' => ['job/create'],
        ],

        [
            'label' => 'Add Company',
            'url' => ['site/companyform'],
        ],

        [
            'label' => 'Logout',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post'],
            'visible' => !(Yii::$app->user->isGuest)            
        ],
        
        
    ],
]);
?>
</aside>
