<?php
/* @var $this yii\web\View */
/* @var $widget \common\modules\cms\modules\admin\widgets\filters\AdminFiltersForm */
/* @var $filter \common\modules\cms\modules\admin\models\CmsAdminFilter */
$widget = $this->context;
?>

<?php
$modelEdit = new \common\modules\cms\modules\admin\models\CmsAdminFilter($widget->filter->toArray());

$updateFormId = $widget->id . '-update-filter';
$updateModal = \yii\bootstrap\Modal::begin([
    'id' => $widget->getEditFilterFormModalId(),
    'header'    => '<b>' . \Yii::t('skeeks/admin', 'Save filter') . '</b>',
    'footer'    => '
        <button class="btn btn-primary" onclick="$(\'#' . $updateFormId . '\').submit(); return false;">' . \Yii::t('skeeks/cms', 'Save') . '</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">' . \Yii::t('skeeks/admin', 'Close') . '</button>
    ',
]);?>

    <?php $form = \common\modules\cms\base\widgets\ActiveFormAjaxSubmit::begin([
            'id'                => $updateFormId,
            'action'            => \yii\helpers\Url::to(['/admin/admin-filter/save']),
            'validationUrl'     => \yii\helpers\Url::to(['/admin/admin-filter/validate']),
            'afterValidateCallback'     => new \yii\web\JsExpression(<<<JS
        function(jForm, AjaxQuery)
        {
            var Handler = new sx.classes.AjaxHandlerStandartRespose(AjaxQuery);
            var Blocker = new sx.classes.AjaxHandlerBlocker(AjaxQuery, {
                'wrapper' : jForm.closest('.modal-content')
            });

            Handler.bind('success', function()
            {
                _.delay(function()
                {
                    window.location.reload();
                }, 1000);
            });
        }
JS
            )
        ]); ?>
        <?= \yii\helpers\Html::hiddenInput('pk', $modelEdit->id); ?>
        <?= $form->field($modelEdit, 'name'); ?>
        <?= $form->field($modelEdit, 'isPublic')->checkbox(\Yii::$app->formatter->booleanFormat); ?>
        <button style="display: none;"></button>
    <?php \common\modules\cms\base\widgets\ActiveFormAjaxSubmit::end(); ?>

<?php $updateModal::end();?>

