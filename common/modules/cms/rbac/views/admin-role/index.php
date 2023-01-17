<?php
?>
<div class="role-index">

    <?php $pjax = \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>

    <?php echo $this->render('_search', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider
    ]); ?>

    <?php

    echo \common\modules\cms\modules\admin\widgets\GridViewStandart::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'adminController' => $controller,
        'pjax' => $pjax,
        'settingsData' =>
            [
                'orderBy' => ''
            ],
        'columns' => [

            [
                'attribute' => 'name',
                'label' => \Yii::t('app', 'Name'),
            ],
            [
                'attribute' => 'description',
                'label' => \Yii::t('app', 'Description'),
            ],

            /*['class' => 'yii\grid\ActionColumn',],*/
        ],
    ]);

    ?>
    <?php $pjax::end(); ?>
</div>