<?php
/* @var $this yii\web\View */
/* @var $searchModel \common\modules\cms\models\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php $pjax = \common\modules\cms\modules\admin\widgets\Pjax::begin(); ?>

<?php echo $this->render('_search', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider
]); ?>

<?= \common\modules\cms\modules\admin\widgets\GridViewStandart::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pjax' => $pjax,
    'adminController' => \Yii::$app->controller,
    'settingsData' =>
        [
            'order' => SORT_ASC,
            'orderBy' => "priority",
        ],
    'columns' =>
        [
            'name',
            'code',

            [
                'value' => function(\common\modules\cms\models\CmsContentType $model) {
                    $contents = \yii\helpers\ArrayHelper::map($model->cmsContents, 'id', 'name');
                    return implode(', ', $contents);
                },

                'label' => 'Контент',
            ],

            'priority',
        ]
]); ?>

<?php $pjax::end(); ?>
