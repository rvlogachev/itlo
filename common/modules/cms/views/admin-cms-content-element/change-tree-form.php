<?php
$model = new \common\modules\cms\models\CmsContentElement();
?>
<?php $form = \yii\widgets\ActiveForm::begin(); ?>

<?= $form->field($model, 'tree_id')->widget(
    \common\modules\backend\widgets\SelectModelDialogTreeWidget::class
); ?>
    <button type="submit" class="btn btn-primary">Сохранить</button>
<?php $form::end(); ?>

<?php $alert = \yii\bootstrap4\Alert::begin([
    'options' => [
        'class' => 'alert-warning',
        'style' => 'margin-top: 20px;',
    ],
]) ?>
    <p><?= \Yii::t('skeeks/cms', 'Attention! For checked items will be given a new primary section.') ?></p>
    <p><?= \Yii::t('skeeks/cms',
            'This will alter the page record, and it will cease to be available at the old address.') ?></p>
<?php $alert::end(); ?>