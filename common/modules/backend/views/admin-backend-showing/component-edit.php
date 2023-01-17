<?php
/**
 * @var $component \common\modules\cms\modules\config\ConfigComponent
 * @var $message string
 */
/* @var $this yii\web\View */

?>

<?php $model = $component->configModel; ?>

<?php $form = \common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::begin([
    'enableAjaxValidation'   => false,
    'enableClientValidation' => false,
]); ?>


<?php
if ($deleted) {

    $this->registerJs(<<<JS
    window.location.reload();

JS
    );
}
?>

<?php if ($error) : ?>
    <?= \yii\bootstrap4\Alert::widget([
        'body'    => $error,
        'options' => [
            'class' => 'alert-danger',
        ],
    ]); ?>
<?php endif; ?>
<?php if ($success) : ?>
    <?= \yii\bootstrap4\Alert::widget([
        'body'    => $success,
        'options' => [
            'class' => 'alert-success',
        ],
    ]); ?>
<?php endif; ?>
<?= $form->errorSummary(\yii\helpers\ArrayHelper::merge(
    [$model], $model->builderModels()
)); ?>

<?php if ($fields = $model->builderFields()) : ?>
    <?php
    echo (new \common\modules\cms\modules\form\Builder([
        'models'     => $model->builderModels(),
        'model'      => $model,
        'activeForm' => $form,
        'fields'     => $model->builderFields(),
    ]))->render(); ?>
<?php else : ?>
    Нет редактируемых настроек для данного компонента
<?php endif; ?>

<?= $form->buttonsStandart($model); ?>
<?= $form->errorSummary(\yii\helpers\ArrayHelper::merge(
    [$model], $model->builderModels()
)); ?>

<?php if ($component->configStorage->exists($component->configBehavior)) : ?>
    <div class="row">
        <div class="col-md-12">
            <button href="#" class="btn btn-danger btn-xs pull-right sx-btn-remove">
                <span class="fa fa-trash"></span> Удалить настройки
            </button>
        </div>
    </div>

    <?php


    $this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.Remove = sx.classes.Component.extend({
    
        _init: function()
        {
            
        },
        
        _onDomReady: function()
        {
            $(".sx-btn-remove").on("click", function() {
                var jForm = $(this).closest('form');
                jForm.append(
                    $("<input>", {
                        'name' : 'delete',
                        'type' : 'hidden',
                        'value' : 'true'
                    })
                ).submit();
                
                return false;
            });
        },
        
        _onWindowReady: function()
        {}
    });
    
    new sx.classes.Remove();
})(sx, sx.$, sx._);
JS
    );
    ?>
<?php endif; ?>

<?php \common\modules\cms\modules\admin\widgets\form\ActiveFormUseTab::end(); ?>
