<?php
/**
 * @var $query \yii\db\ActiveQuery
 */
$query = $dataProvider->query;
$filter = new \yii\base\DynamicModel([
    'fill',
]);
$filter->addRule('fill', 'integer');

$filter->load(\Yii::$app->request->get());

if ($filter->fill) {
    $query->joinWith('cmsTreeProperties as tp');
    $query->andWhere(['!=', 'tp.value', '']);
    $query->andWhere(['tp.property_id' => $filter->fill]);
    $query->groupBy('id');
}

/*if ($filter->not_fill == 'not_fill')
{
    $query->joinWith('elementProperties as ep');
    $query->andWhere(['=', 'value', '']);
    $query->groupBy('id');
}*/
?>
<?php $form = \common\modules\cms\modules\admin\widgets\filters\AdminFiltersForm::begin([
    'action' => '/' . \Yii::$app->request->pathInfo,
]); ?>

<?= $form->field($searchModel, 'name')->setVisible(true)->textInput([
    'placeholder' => \Yii::t('skeeks/cms', 'Search by name')
]) ?>

<?= $form->field($searchModel, 'id') ?>

<?= $form->field($searchModel, 'code'); ?>

<?= $form->field($searchModel, 'active')->listBox(\yii\helpers\ArrayHelper::merge([
    '' => ' - '
], \Yii::$app->cms->booleanFormat()), [
    'size' => 1
]); ?>

<?= $form->field($filter, 'fill')
    ->label(\Yii::t('skeeks/cms', 'Связь с разделами'))
    ->widget(
         \common\modules\cms\modules\chosen\Chosen::class,
        [
            'items' => \yii\helpers\ArrayHelper::map(
                \common\modules\cms\models\CmsTreeTypeProperty::find()->all(), 'id', 'name'
            )
        ]
    ); ?>

<?php $form::end(); ?>
