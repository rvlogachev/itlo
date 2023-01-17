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
        'clientCallback'                     => new \yii\web\JsExpression(<<<JS
            function(ActiveFormAjaxSubmit)
            {
                ActiveFormAjaxSubmit.on('success', function(e, response)
                {
                    $('input, textarea', ActiveFormAjaxSubmit.jForm).each(function(value, key)
                    {
                        var name = $(this).attr('name');
                        if (name != '_csrf' && name != 'sx-model-value' && name != 'sx-model')
                        {
                            $(this).val('');
                        }
                    });
                });
            }
JS
),
    ]);
?>

<?php if ($properties = $modelHasRelatedProperties->relatedProperties) : ?>
    <?php foreach ($properties as $property) : ?>
        <?= $property->renderActiveForm($form, $modelHasRelatedProperties); ?>
    <?php endforeach; ?>
<?php endif; ?>

<?= \yii\helpers\Html::submitButton("" . \Yii::t('skeeks/form2/app', $widget->btnSubmit), [
    'class' => $widget->btnSubmitClass,
]); ?>

<?php ActiveForm::end(); ?>