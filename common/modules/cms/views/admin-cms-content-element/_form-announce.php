<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
/* @var $relatedModel \common\modules\cms\relatedProperties\models\RelatedPropertiesModel */
?>
<?= $form->fieldSet(\Yii::t('skeeks/cms', 'Announcement')); ?>
<?php //echo $form->field($model, 'image_id')->widget(
//    \common\modules\cms\widgets\AjaxFileUploadWidget::class,
//    [
//        'accept' => 'image/*',
//        'multiple' => false
//    ]
//); ?>
<?= $form->field($model, 'description_short')->widget(
    \common\modules\cms\widgets\formInputs\comboText\ComboTextInputWidget::className(),
    [
        'modelAttributeSaveType' => 'description_short_type',
    ]);
?>
<?= $form->fieldSetEnd() ?>
