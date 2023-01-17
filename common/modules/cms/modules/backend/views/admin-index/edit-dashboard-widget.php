<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\modules\cms\models\CmsDashboardWidget
 */
?>

<?php $form = \common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::begin(); ?>

    <?php if ($model->widget) : ?>
        <?php $model->widget->renderConfigForm($form); ?>
    <?php else : ?>
        Настройки не найдены
    <?php endif;  ?>

    <?= $form->buttonsStandart($model->widget); ?>
<?php \common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::end(); ?>
