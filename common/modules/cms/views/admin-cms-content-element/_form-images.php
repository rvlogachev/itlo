<?php
/* @var $this yii\web\View */
/* @var $model \common\modules\cms\models\CmsContentElement */
/* @var $relatedModel \common\modules\cms\relatedProperties\models\RelatedPropertiesModel */
?>
<?= $form->fieldSet(\Yii::t('skeeks/cms', 'Images/Files')); ?>

<?php //echo $form->field($model, 'imageIds')->widget(
//    \common\modules\cms\widgets\AjaxFileUploadWidget::class,
//    [
//        'accept' => 'image/*',
//        'multiple' => true
//    ]
//); ?>
<!---->
<?php //echo $form->field($model, 'fileIds')->widget(
//    \common\modules\cms\widgets\AjaxFileUploadWidget::class,
//    [
//        'multiple' => true
//    ]
//); ?>

<?= $form->fieldSetEnd() ?>
