<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.08.2015
 */

use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;

/* @var $this yii\web\View */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->fieldSet(\skeeks\cms\shop\Module::t('app', 'Main settings')); ?>


<?= $form->field($model, 'name')->textInput(['maxlength' => 255]); ?>
<?= $form->field($model, 'active')->checkbox([
    'uncheck' => \skeeks\cms\components\Cms::BOOL_N,
    'value'   => \skeeks\cms\components\Cms::BOOL_Y,
]); ?>
<?= $form->field($model, 'siteCodes')->checkboxList(
    \yii\helpers\ArrayHelper::map(\skeeks\cms\models\CmsSite::find()->all(), 'code', 'name')
); ?>
<?= $form->field($model, 'priority'); ?>

<?= $form->fieldSetEnd(); ?>


<?php if (!$model->isNewRecord) : ?>
    <?= $form->fieldSet('Свойства') ?>
    <?= \skeeks\cms\modules\admin\widgets\RelatedModelsGrid::widget([
        'label'       => \skeeks\cms\shop\Module::t('app', 'Properties payer'),
        'hint'        => \skeeks\cms\shop\Module::t('app',
            'Each payer may have its own set of properties that it will ask when ordering.'),
        'parentModel' => $model,
        'relation'    => [
            'shop_person_type_id' => 'id',
        ],

        'controllerRoute' => '/shop/admin-person-type-property',
        'gridViewOptions' => [
            'sortable' => true,
            'columns'  => [
                [
                    'attribute'     => 'name',
                    'enableSorting' => false,
                ],

                [
                    'class'         => \skeeks\cms\grid\BooleanColumn::class,
                    'attribute'     => 'active',
                    'falseValue'    => \skeeks\cms\components\Cms::BOOL_N,
                    'trueValue'     => \skeeks\cms\components\Cms::BOOL_Y,
                    'enableSorting' => false,
                ],

                [
                    'attribute'     => 'code',
                    'enableSorting' => false,
                ],

                [
                    'attribute'     => 'priority',
                    'enableSorting' => false,
                ],
            ],
        ],
    ]); ?>
    <?= $form->fieldSetEnd(); ?>
<?php endif; ?>


<?= $form->buttonsStandart($model); ?>
<?php ActiveForm::end(); ?>
