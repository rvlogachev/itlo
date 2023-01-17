<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
/* @var $relatedModel \common\modules\cms\relatedProperties\models\RelatedPropertiesModel */
?>
<?= $form->fieldSet(\Yii::t('skeeks/cms', 'In detal')); ?>

<?php //echo $form->field($model, 'image_full_id')->widget(
//     \common\modules\cms\widgets\AjaxFileUploadWidget::class,
//    [
//        'accept' => 'image/*',
//        'multiple' => false
//    ]
//); ?>

<?= $form->field($model, 'description_full')->widget(
     \common\modules\cms\widgets\formInputs\comboText\ComboTextInputWidget::className(),
    [
        'modelAttributeSaveType' => 'description_full_type',
    ]);
?>

<?= $form->fieldSetEnd() ?>
