<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 17.03.2015
 *
 * @var $widget \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget
 */
use skeeks\modules\cms\form2\widgets\ActiveFormConstructForm as ActiveForm;

$modelHasRelatedProperties = $widget->modelForm->createModelFormSend();

?>
    <?php $form = ActiveForm::begin([
        'id'                                        => $widget->id . "-active-form",
        'modelForm'                                 => $widget->modelForm,
        'afterValidateCallback'                     => new \yii\web\JsExpression(<<<JS
            function(jForm, ajax)
            {
                var handler = new sx.classes.AjaxHandlerStandartRespose(ajax, {
                    'blockerSelector' : '#' + jForm.attr('id'),
                    'enableBlocker' : true,
                });

                handler.bind('error', function(e, data)
                {
                    $('.sx-success-message', jForm).hide();
                    $('.sx-error-message', jForm).show();
                    $('.sx-error-message .sx-body', jForm).empty().append(data.message);
                });

                handler.bind('success', function(e, data)
                {
                    $('.sx-error-message', jForm).hide();
                    $('.sx-success-message', jForm).show();
                    $('.sx-success-message .sx-body', jForm).empty().append(data.message);

                    $('input, textarea', jForm).each(function(value, key)
                    {
                        var name = $(this).attr('name');
                        if (name != '_csrf' && name != 'sx-model-value' && name != 'sx-model')
                        {
                            $(this).val('');
                        }
                    });

                    $.fancybox.close();
                });
            }
JS
),
    ]);
?>
<?= \yii\bootstrap4\Alert::widget([
    'options' => [
        'class' => 'alert-success sx-success-message',
        'style' => 'display: none;',
    ],
    'closeButton' => false,
    'body' => '<div class="sx-body">Ok</div>',
])?>

<?= \yii\bootstrap4\Alert::widget([
    'options' => [
        'class' => 'alert-danger sx-error-message',
        'style' => 'display: none;',
    ],
    'closeButton' => false,
    'body' => '<div class="sx-body">Ok</div>',
])?>

<?php if ($properties = $modelHasRelatedProperties->relatedProperties) : ?>
    <?php foreach ($properties as $property) : ?>
        <?= $property->renderActiveForm($form, $modelHasRelatedProperties); ?>
    <?php endforeach; ?>
<?php endif; ?>

<?= \yii\helpers\Html::submitButton("" . \Yii::t('skeeks/form2/app', $widget->btnSubmit), [
    'class' => $widget->btnSubmitClass,
]); ?>

<?php ActiveForm::end(); ?>