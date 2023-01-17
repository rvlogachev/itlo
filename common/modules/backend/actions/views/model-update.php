<?php
/* @var $this yii\web\View */
/* @var $controller \common\modules\backend\controllers\BackendModelController */
/* @var $action \common\modules\backend\actions\BackendModelCreateAction|\common\modules\backend\actions\IHasActiveForm */
/* @var $model \common\modules\cms\models\CmsLang */
$controller = $this->context;
$action = $controller->action;

?>

<?php if ($action->beforeContent) : ?>
    <div class="sx-box sx-p-10 sx-bg-primary" style="margin-bottom: 10px;">
        <?php echo $action->beforeContent; ?>
    </div>
<?php endif; ?>


<?php $form = $action->beginActiveForm([
    'enableAjaxValidation'   => false,
    'enableClientValidation' => false,
]); ?>

<?php if ($is_saved && @$is_create) : ?>
    <?php $this->registerJs(<<<JS
    sx.Window.openerWidgetTriggerEvent('model-create', {
        'submitBtn' : '{$submitBtn}'
    });
JS
    ); ?>

<?php elseif ($is_saved) : ?>
    <?php $this->registerJs(<<<JS
sx.Window.openerWidgetTriggerEvent('model-update', {
        'submitBtn' : '{$submitBtn}'
    });
JS
    ); ?>
<?php endif; ?>

<?php if (@$redirect) : ?>
    <?php $this->registerJs(<<<JS
window.location.href = '{$redirect}';
console.log('window.location.href');
console.log('{$redirect}');
JS
    ); ?>
<?php endif; ?>
<?php $this->registerJs(<<<JS

(function(sx, $, _)
{
    sx.classes.DynamicForm = sx.classes.Component.extend({

        _onDomReady: function()
        {
            var self = this;

            $("[" + this.get('formreload') + "=true]").on('change', function()
            {
                self.update();
            });
        },

        update: function()
        {
            var self = this;
            
            _.delay(function()
            {
                var jForm = $("#" + self.get('id'));
                jForm.append($('<input>', {'type': 'hidden', 'name' : self.get('nosubmit'), 'value': 'true'}));
                jForm.submit();
            }, 200);
        }
    });

    sx.DynamicForm = new sx.classes.DynamicForm({
        'id' : '{$form->id}',
        'formreload' : '{$action->reloadFieldParam}',
        'nosubmit' : '{$action->reloadFormParam}',
    });
})(sx, sx.$, sx._);


JS
); ?>

<?= $form->errorSummary($formModels); ?>

<?php echo \Yii::createObject([
    'class'      => \common\modules\cms\modules\form\Builder::class,
    'model'      => $model,
    'models'     => $formModels,
    'activeForm' => $form,
    'fields'     => $action->fields,
])->render(); ?>
<?php /* echo (new \skeeks\yii2\form\Builder([
            'model' => $model,
            'models' => $formModels,
            'activeForm' => $form,
            'fields' => $action->fields,
        ]))->render(); */ ?>

<?= $form->buttonsStandart($model, $action->buttons); ?>
<?= $form->errorSummary($formModels); ?>
<?php //$action->endActiveForm(); ?>


<?php if ($action->afterContent) : ?>
    <div class="sx-box sx-p-10 sx-bg-primary" style="margin-bottom: 10px;">
        <?php echo $action->preContent; ?>
    </div>
<?php endif; ?>
