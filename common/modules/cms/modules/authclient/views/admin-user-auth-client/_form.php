<?php
/* @var $this yii\web\View */
/* @var $model \yii\db\ActiveRecord */
?>
<?php $form = common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::begin(); ?>

    <?= $form->fieldSet(\Yii::t('app',"Main")); ?>
    <?php if (\Yii::$app->request->get('user_id')) : ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => \Yii::$app->request->get('user_id')])->label(false) ?>
    <?php else: ?>
        <?= $form->field($model, 'user_id')->widget(
            \skeeks\cms\backend\widgets\SelectModelDialogUserWidget::class
        ); ?>
    <?php endif; ?>

    <?= $form->fieldSetEnd(); ?>

    <?php if (!$model->isNewRecord) : ?>
        <?= $form->fieldSet(\Yii::t('app',"Data of provider")); ?>
<!--            --><?php //\yii\widgets\DetailView::widget([
//                'model'         => $model->provider_data,
//                'attributes'    => array_keys((array) $model->provider_data),
//            ]) ?>
            <pre>
            <?php
                print_r($model->provider_data);
            ?>
            </pre>
        <?= $form->fieldSetEnd(); ?>
    <?php endif; ?>


    <?= $form->buttonsStandart($model); ?>
<?php common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::end(); ?>
