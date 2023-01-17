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
    'adminController' => $controller,
    'settingsData' =>
        [
            'orderBy' => ''
        ],
    'pjax' => $pjax,
    'columns' => [


        'name',
        'description',
        [
            'attribute' => 'ruleName',
            /*'filter'    => \yii\helpers\ArrayHelper::map(
                \Yii::$app->cms->findUser()->all(),
                'id',
                'name'
            )*/
        ]
    ],
]); ?>

<?php $pjax::end(); ?>

