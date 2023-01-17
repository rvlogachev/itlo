<?php
/* @var $this yii\web\View */
/* @var $searchModel \common\modules\cms\models\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \common\modules\cms\models\CmsTree */
?>
<?php $pjax = \yii\widgets\Pjax::begin(); ?>

<?php echo $this->render('_search', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]); ?>

<?= \common\modules\cms\modules\admin\widgets\GridViewStandart::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'autoColumns' => false,
    'pjax' => $pjax,
    'adminController' => $controller,
    'columns' =>
        [
            'name',
            'code',
            'treeType.name',
            'level',
            /*[
                'label' => \Yii::t('skeeks/cms', 'Sections'),
                'value' => function(\skeeks\cms\models\CmsTreeTypeProperty $cmsContentProperty)
                {
                    $contents = \yii\helpers\ArrayHelper::map($cmsContentProperty->cmsTreeTypes, 'id', 'name');
                    return implode(', ', $contents);
                }
            ],
            [
                'label' => \Yii::t('skeeks/cms', 'Number of partitions where the property is filled'),
                'value' => function(\skeeks\cms\models\CmsTreeTypeProperty $cmsContentProperty)
                {
                    return $cmsContentProperty->getElementProperties()->andWhere(['!=', 'value', ''])->count();
                }
            ],
            [
                'class'         => \skeeks\cms\grid\BooleanColumn::className(),
                'attribute'     => "active"
            ],*/
        ]
]); ?>

<?php \yii\widgets\Pjax::end(); ?>